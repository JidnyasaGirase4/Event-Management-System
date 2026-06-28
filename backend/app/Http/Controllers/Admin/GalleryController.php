<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index', ['items' => Gallery::orderBy('sort')->get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:60',
            'title'    => 'nullable|string|max:160',
            'image'    => 'required|image|max:4096',
        ]);
        $name = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
        Gallery::create([
            'category' => $request->category,
            'title'    => $request->title,
            'image'    => $request->file('image')->storeAs('uploads', $name, 'public'),
            'sort'     => (int) Gallery::max('sort') + 1,
        ]);
        return back()->with('success', 'Image added to gallery.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.form', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'category' => 'required|string|max:60',
            'title'    => 'nullable|string|max:160',
            'sort'     => 'nullable|integer',
            'image'    => 'nullable|image|max:4096',
        ]);
        $data = [
            'category' => $request->category,
            'title'    => $request->title,
            'sort'     => (int) $request->input('sort', $gallery->sort),
        ];
        if ($request->hasFile('image')) {
            $name = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $data['image'] = $request->file('image')->storeAs('uploads', $name, 'public');
        }
        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated.');
    }
}
