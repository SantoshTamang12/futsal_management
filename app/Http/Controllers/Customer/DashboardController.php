<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->customer_bookings()->count();

        return view('customer.index', compact('bookings'));
    }
}
