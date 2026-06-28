<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::orderBy('sort')->get()]);
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        Testimonial::create($this->data($request));
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update($this->data($request));
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted.');
    }

    private function data(Request $request): array
    {
        $v = $request->validate([
            'name'       => 'required|string|max:120',
            'role'       => 'nullable|string|max:120',
            'event_type' => 'nullable|string|max:60',
            'review'     => 'required|string',
            'rating'     => 'required|integer|min:1|max:5',
            'sort'       => 'nullable|integer',
            'avatar'     => 'nullable|image|max:4096',
        ]);
        $v['sort'] = (int) $request->input('sort', 0);
        if ($request->hasFile('avatar')) {
            $name = Str::random(10) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $v['avatar'] = $request->file('avatar')->storeAs('uploads', $name, 'public');
        } else {
            unset($v['avatar']);
        }
        return $v;
    }
}
