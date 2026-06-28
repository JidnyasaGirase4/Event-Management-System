<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        Inquiry::where('is_read', false)->update(['is_read' => true]);
        return view('admin.inquiries.index', ['inquiries' => $inquiries]);
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return back()->with('success', 'Inquiry deleted.');
    }
}
