<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];

    /** Fetch a single content value by "page.section.item_key". */
    public static function val(string $path, $default = ''): string
    {
        [$page, $section, $key] = array_pad(explode('.', $path), 3, null);
        $row = static::where('page', $page)->where('section', $section)
            ->where('item_key', $key)->first();
        return $row && $row->value !== null && $row->value !== '' ? $row->value : (string) $default;
    }

    /** Image URL for an image content item (falls back to a default asset). */
    public static function img(string $path, ?string $default = null): string
    {
        $v = static::val($path, '');
        if ($v === '') return $default ? asset($default) : '';
        // already a full url or an existing assets/ path
        if (str_starts_with($v, 'http')) return $v;
        if (str_starts_with($v, 'assets/')) return asset($v);
        return asset('storage/' . ltrim($v, '/'));
    }
}
