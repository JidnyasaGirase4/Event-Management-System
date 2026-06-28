<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::orderBy('sort')->get()]);
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => new Category()]);
    }

    public function store(Request $request)
    {
        Category::create($this->data($request));
        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($this->data($request, $category));
        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted.');
    }

    private function data(Request $request, ?Category $category = null): array
    {
        $v = $request->validate([
            'name'        => 'required|string|max:120',
            'description' => 'nullable|string',
            'sort'        => 'nullable|integer',
        ]);
        $v['sort'] = (int) $request->input('sort', 0);
        $v['slug'] = Str::slug($v['name']) ?: Str::random(6);
        return $v;
    }
}
