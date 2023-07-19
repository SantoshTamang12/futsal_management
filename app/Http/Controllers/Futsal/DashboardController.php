<?php

namespace App\Http\Controllers\Futsal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->futsal_bookings()->count();
        $timings = auth()->user()->futsal_timings()->count();

        return view('futsal.index', compact('bookings', 'timings'));
    }

    public function notifications()
    {
        $notifications = auth()->user()->unreadNotifications()->latest()->paginate(10);

        return view("futsal.notifications", compact('notifications'));

    }
}
