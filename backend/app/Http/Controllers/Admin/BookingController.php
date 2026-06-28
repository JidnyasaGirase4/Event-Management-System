<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index', ['bookings' => Booking::latest()->get()]);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:Pending,Confirmed,Completed,Cancelled']);
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Booking status updated.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking deleted.');
    }
}
