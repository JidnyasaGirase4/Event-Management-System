<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Repeater field schemas, keyed by "page.section.item_key".
     * Each value maps a sub-field name => input type (text | textarea | image).
     */
    public const REPEATERS = [
        'home.why.cards'          => ['icon' => 'text', 'title' => 'text', 'text' => 'textarea'],
        'home.categories.cats'    => ['image' => 'image', 'title' => 'text', 'text' => 'textarea'],
        'about.values.cards'      => ['icon' => 'text', 'title' => 'text', 'text' => 'textarea'],
        'services.process.steps'  => ['icon' => 'text', 'title' => 'text', 'text' => 'textarea'],
    ];

    /** Pages exposed in the admin menu (page key => label). */
    public const PAGES = [
        'home'     => 'Home Page',
        'about'    => 'About Page',
        'services' => 'Services Page',
        'packages' => 'Packages Page',
        'gallery'  => 'Gallery Page',
        'reviews'  => 'Reviews Page',
        'contact'  => 'Contact Page',
        'book'     => 'Book Page',
        'global'   => 'Global (Footer / Contact)',
    ];

    public function edit(string $page)
    {
        abort_unless(array_key_exists($page, self::PAGES), 404);

        $sections = Content::where('page', $page)
            ->orderBy('sort')
            ->get()
            ->groupBy('section');

        return view('admin.content', [
            'page'      => $page,
            'pageName'  => self::PAGES[$page],
            'sections'  => $sections,
            'repeaters' => self::REPEATERS,
        ]);
    }

    public function update(Request $request, string $page)
    {
        abort_unless(array_key_exists($page, self::PAGES), 404);

        $items = Content::where('page', $page)->get();

        foreach ($items as $item) {
            // repeater (JSON list of rows, optional per-row image uploads)?
            if ($item->type === 'repeater') {
                $rows  = $request->input("repeater.$item->id", []);
                $files = $request->file("repeater_image.$item->id", []);
                $out   = [];

                foreach ($rows as $key => $row) {
                    $row = is_array($row) ? $row : [];

                    // replace any sub-field that received a new uploaded file
                    if (isset($files[$key]) && is_array($files[$key])) {
                        foreach ($files[$key] as $sub => $file) {
                            if ($file) {
                                $row[$sub] = $this->storeUpload($file);
                            }
                        }
                    }

                    // drop rows where every field is blank
                    if (count(array_filter($row, fn ($v) => $v !== null && $v !== ''))) {
                        $out[] = $row;
                    }
                }

                $item->value = json_encode(array_values($out));
                $item->save();
                continue;
            }

            // image upload?
            if ($request->hasFile("image.$item->id")) {
                $item->value = $this->storeUpload($request->file("image.$item->id"));
                $item->save();
                continue;
            }
            // text value?
            if ($request->has("value.$item->id")) {
                $item->value = $request->input("value.$item->id");
                $item->save();
            }
        }

        return back()->with('success', 'Content updated successfully.');
    }

    /** Store an uploaded file in storage/app/public/uploads and return its relative path. */
    private function storeUpload($file): string
    {
        $name = Str::random(10) . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

        return $file->storeAs('uploads', $name, 'public');
    }
}
