<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Package;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'bookings'     => Booking::count(),
                'packages'     => Package::count(),
                'inquiries'    => Inquiry::count(),
                'testimonials' => Testimonial::count(),
                'gallery'      => Gallery::count(),
                'pending'      => Booking::where('status', 'Pending')->count(),
            ],
            'recentBookings' => Booking::latest()->take(5)->get(),
            'recentInquiries' => Inquiry::latest()->take(5)->get(),
        ]);
    }
}
