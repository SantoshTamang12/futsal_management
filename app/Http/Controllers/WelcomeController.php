<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Timing;
use App\Models\Futsal_timing;

class WelcomeController extends Controller
{
    public function index()
    {

        $futsals = User::where('role', 'Futsal')->with(['futsal_timings'])->paginate(10);

        return view('welcome', compact('futsals'));
    }

    public function search(Request $request)
    {

        $futsals = User::where('role', 'Futsal')->where('name', 'like', '%' . $request->q . '%')->with(['futsal_timings'])->paginate(10);

        $q = $request->q;
        return view('results', compact('futsals', 'q'));
    }

    public function venues()
    {

        $futsals = User::where('role', 'Futsal')->with(['futsal_timings', 'futsal_timings.timing'])->paginate(10);
        return view('venues', compact('futsals'));
    }

    public function show($id)
    {

        $futsal = User::with('futsal_timings')->findOrfail($id);

        $slots = $this->generateCalendarData($futsal);

        return view('show', compact('futsal', 'slots'));
    }

    public function generateTimeRange($futsal, $currentDate, $from, $to)
    {

        $timeRange = [];

        $start = new \DateTime($from);
        $end   = new \DateTime($to);
        $interval = new \DateInterval("PT60M");
        $cleanupInterval = new \DateInterval("PT0M");


        for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {

            $endPeriod    = clone $intStart;

            $endPeriod->add($interval);

            if ($endPeriod > $end) {
                break;
            }


            $alreadyBooked = Booking::where('futsal_id', $futsal->id)
                ->where('date', $currentDate)
                ->where('from', date('H:i:s', strtotime($intStart->format("H:i"))))
                ->where('to',  date('H:i:s', strtotime($endPeriod->format("H:i"))))
                ->first();

            $timing = Timing::where('from', date('H:i:s', strtotime($intStart->format("H:i"))))
                ->where('to', date('H:i:s', strtotime($endPeriod->format("H:i"))))
                ->first();

            $isBooked = !$timing || $alreadyBooked || $currentDate == date("Y-m-d")
                && (new \DateTime("now", new \DateTimeZone("Asia/Kathmandu")))->format('H:i:s') > $intStart->format("H:i:s");

            if ($timing) {

                $futsal_timing = Futsal_timing::where("user_id", $futsal->id)
                    ->where('timing_id', $timing->id)
                    ->first();
            }

            array_push($timeRange, [
                'date'  => $currentDate,
                'start' => date('H:i:s', strtotime($intStart->format("H:i"))),
                'end'   => date('H:i:s', strtotime($endPeriod->format("H:i"))),
                "booked" => $isBooked ? true : false,
                'price'  => $timing ? $timing->price : 0

            ]);
        }


        // dd($timeRange, count($timeRange));
        return $timeRange;
    }


    protected function generateCalendarData($futsal)
    {
        $slots = [];

        $startDate = new \DateTime();

        for ($i = 0; $i <= 7; $i++) {
            $slots[] = [
                "day"  => date('l', strtotime($startDate->format('Y-m-d'))),
                "times" => $this->generateTimeRange($futsal, $startDate->format("Y-m-d"), "06:00", '17:00')
            ];

            $startDate->modify("+1day");
        }


        return $slots;
    }

    // public function search()
    // {
    //     $search_text = $_GET['search'];
    //     $users = User::where('name', 'LIKE', '%' . $search_text . '%')
    //         ->where('role', '=', 'Futsal')
    //         ->get();
    //     // dd($users);
    //     return view('searchvenues', compact('users'));
    // }
}
