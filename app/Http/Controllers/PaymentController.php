<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Futsal_timing;
use Illuminate\Support\Facades\Http;
use App\Models\Admin;
use App\Models\User;
use App\Models\Timing;
use App\Models\Booking;
use App\Notifications\NotifyTo;

class PaymentController extends Controller
{
    public function book(Request $request)
    {
        if (auth()->user()->role !==  'Customer') {

            return back()->with(['error' => 'Booking failed.']);
        }


        $validated = $request->validate([
            'futsal_id'    => 'required|exists:users,id',
            'date'          => 'required',
            'from'          => 'required|date_format:H:i:s',
            'to'            => 'required|date_format:H:i:s',
        ]);

        $futsal  = User::findOrfail($request->futsal_id);

        $timing = Timing::where('from', $validated['from'])
            ->where('to', $validated['to'])
            ->first();

        // return $timing;
        if (!$timing) {
            return back()
                ->withInput($request->input())
                ->with(['error' => 'The futsal is unavailable for the current time.']);
        }

        $futsal_timing = Futsal_timing::where("user_id", $validated['futsal_id'])
            ->where('timing_id', $timing->id)
            ->first();

        if (!$futsal_timing) return back()
            ->withInput($request->input())
            ->with(['error' => 'The futsal is unavailable for the current time.']);

        // return $futsal_timing;
        //check if the time has been booked at the given date
        $alreadyBooked = Booking::where('futsal_id', $futsal->id)
            ->where('date', $request->date)
            ->where('from', $validated['from'])
            ->where('to',  $validated['to'])
            ->first();

        if ($futsal_timing->timing_id != $timing->id) {
            return back()
                ->withInput($request->input())
                ->with(['error' => 'The futsal is unavailable for the current time.']);
        }

        if ($alreadyBooked) {

            return back()
                ->withInput($request->input())
                ->with(['error' => 'The time of the day has already been booked.']);
        }

        $transaction   = str()->uuid();

        $verify_url    = "https://a.khalti.com/api/v2/epayment/initiate/";

        $response = Http::withoutVerifying()->withHeaders([

            'Authorization'  => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type'   => 'application/json',

        ])->withOptions(["verify" => false])->post($verify_url, [

            "return_url"              => route('success'),
            "website_url"             => env('APP_URL'),
            "amount"                  => (int) $timing->price * 100,
            "purchase_order_id"       => $transaction,
            "purchase_order_name"     => "Futsal Payment",

        ]);
        $response_data = json_decode($response->body(), TRUE);
        // return $response_data;


        error_log($response->status());

        error_log(json_encode($response->body()));

        if ($response->failed() || !$response_data['payment_url']) {

            return redirect()->route('failure')->with(['error' => 'Payment failed. Please try again later.' . ' REASON:' . $response_data['detail'] ?? "UNKNOWN:" . $response_data['detail']]);
        }

        $booking = auth()->user()->customer_bookings()->create([
            'futsal_id'         => $futsal->id,
            'transaction_id'    => $transaction,
            'pidx'              => $response_data['pidx'],
            'date'              => $request->date,
            'from'              => $request->from,
            'to'                => $request->to,
            'price'             => $timing->price
        ]);

        $checkout_url   = $response_data['payment_url'];

        return view('form-submit', compact('checkout_url'));
    }


    public function success(Request $request)
    {

        error_log(json_encode($request->all()));

        if (
            request()->message ||
            !request()->pidx ||
            !request()->amount ||
            !request()->purchase_order_id ||
            !request()->purchase_order_name ||
            !request()->transaction_id
        ) {

            return redirect()->route('failure')->with(['success' => 'Booking failed.']);
        }

        $booking = Booking::where('pidx', $request->pidx)
            ->where('transaction_id', $request->purchase_order_id)
            ->first();

        if (!$booking) {

            return redirect()->route('failure')->with(['success' => 'Booking already completed.']);
        }


        $verify_url    = "https://a.khalti.com/api/v2/epayment/lookup/";

        $response = Http::withHeaders([

            'Authorization'  => 'Key ' . env('KHALTI_SECRET_KEY'),

            'Content-Type'   => 'application/json',

        ])->post($verify_url, [

            "pidx"          => $request->pidx,

        ]);

        $response_data = json_decode($response->body(), TRUE);

        error_log($response->status());

        error_log(json_encode($response->body()));

        if ($response->failed() || $response_data['status'] != 'Completed') {

            $booking->update([
                'status'                => 'Failed'
            ]);

            return redirect()->route('failure')->with(['error' => 'Payment failed. Please try again later.']);
        }

        $booking->update([
            'status'                => 'Completed'
        ]);


        $booking->futsal->notify(new \App\Notifications\NotifyTo($booking->futsal, $booking->from, $booking->to, $booking->date));

        Admin::first()
            ->notify(new \App\Notifications\NotifyTo($booking->futsal, $booking->from, $booking->to, $booking->date));


        return view('success')->with(['success' => 'Booking Successful']);
    }

    public function failure(Request $request)
    {

        return view('failure')->with(['success' => 'Booking failed']);
    }
}
