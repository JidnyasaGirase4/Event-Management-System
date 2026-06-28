<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        return view('admin.packages.index', ['packages' => Package::orderBy('sort')->get()]);
    }

    public function create()
    {
        return view('admin.packages.form', ['package' => new Package(), 'categories' => Category::orderBy('sort')->get()]);
    }

    public function store(Request $request)
    {
        $package = Package::create($this->data($request));
        return redirect()->route('admin.packages.index')->with('success', 'Package created.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.form', ['package' => $package, 'categories' => Category::orderBy('sort')->get()]);
    }

    public function update(Request $request, Package $package)
    {
        $package->update($this->data($request, $package));
        return redirect()->route('admin.packages.index')->with('success', 'Package updated.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success', 'Package deleted.');
    }

    private function data(Request $request, ?Package $package = null): array
    {
        $v = $request->validate([
            'name'        => 'required|string|max:160',
            'event_type'  => 'required|string|max:60',
            'price'       => 'required|string|max:60',
            'badge'       => 'nullable|string|max:60',
            'is_featured' => 'nullable|boolean',
            'description' => 'nullable|string',
            'features'    => 'nullable|string',
            'sort'        => 'nullable|integer',
            'image'       => 'nullable|image|max:4096',
        ]);
        $v['is_featured'] = $request->boolean('is_featured');
        $v['sort'] = (int) $request->input('sort', 0);

        if ($request->hasFile('image')) {
            $v['image'] = $this->upload($request->file('image'));
        } else {
            unset($v['image']);
        }
        return $v;
    }

    private function upload($file): string
    {
        $name = Str::random(10) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads', $name, 'public');
    }
}
