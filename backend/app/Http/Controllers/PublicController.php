<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('index', [
            'featured'     => Package::orderByDesc('is_featured')->orderBy('sort')->take(3)->get(),
            'testimonials' => Testimonial::orderBy('sort')->take(6)->get(),
            'gallery'      => Gallery::orderBy('sort')->take(4)->get(),
        ]);
    }

    public function packages()
    {
        return view('packages', ['packages' => Package::orderBy('sort')->get()]);
    }

    public function gallery()
    {
        return view('gallery', ['items' => Gallery::orderBy('sort')->get()]);
    }

    public function testimonials()
    {
        return view('testimonials', ['testimonials' => Testimonial::orderBy('sort')->get()]);
    }

    public function contact()
    {
        return view('contact', ['categories' => Category::orderBy('sort')->get()]);
    }

    public function book()
    {
        return view('book', [
            'packages'   => Package::orderBy('event_type')->orderBy('sort')->get()->groupBy('event_type'),
            'categories' => Category::orderBy('sort')->get(),
        ]);
    }

    public function storeInquiry(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:120',
            'email'      => 'required|email|max:160',
            'phone'      => 'nullable|string|max:40',
            'event_type' => 'nullable|string|max:60',
            'message'    => 'required|string',
        ]);
        Inquiry::create($data);
        return back()->with('success', 'Thank you! Your message has been sent. We will be in touch soon.');
    }

    public function storeBooking(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:120',
            'email'         => 'required|email|max:160',
            'phone'         => 'required|string|max:40',
            'event_type'    => 'nullable|string|max:60',
            'package'       => 'nullable|string|max:120',
            'event_date'    => 'nullable|date',
            'guests'        => 'nullable|integer|min:1',
            'location'      => 'nullable|string|max:160',
            'requirements'  => 'nullable|string',
        ]);
        Booking::create($data);
        return back()->with('success', 'Booking request received! Our team will contact you shortly to confirm.');
    }
}
