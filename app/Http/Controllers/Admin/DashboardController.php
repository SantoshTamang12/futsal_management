<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Timing;

class DashboardController extends Controller
{
    public function index()
    {
        $rows = User::get();

        $futsals       = collect($rows)->where('role', 'Futsal')->count();
        $customers     = collect($rows)->where('role', 'Customer')->count();
        $timings       = Timing::count();
        $bookings       = Booking::count();

        return view('admin.dashboard', compact('futsals', 'customers', 'timings', 'bookings'));
    }


    public function notifications()
    {
        $notifications = auth('admin')->user()->unreadNotifications()->get();

        $html = [];

        foreach($notifications as $notification)
        {
            $html[] = [
                'text' => $notification['data']['from'] . "-". $notification['data']['to'] . " has been booked.",
                'time' => $notification->created_at->diffForHumans(),
            ];
        }
    
        $dropdownHtml = '';
    
        foreach ($html as $key => $not) {
    
            $time = "<span class='float-right text-muted text-sm'>
                       {$not['time']}
                     </span>";
    
            $dropdownHtml .= "<a href='#' class='dropdown-item'>
                                {$not['text']}{$time}
                              </a>";
    
            if ($key < count($html) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }
    
    
        return [
            'label'       => count($html),
            'label_color' => 'danger',
            'icon_color'  => 'dark',
            'dropdown'    => $dropdownHtml,
        ];
    
    }

}
