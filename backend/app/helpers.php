<?php

use App\Models\Content;

if (! function_exists('c')) {
    /** Get a CMS text value by "page.section.key". */
    function c(string $path, $default = ''): string
    {
        return Content::val($path, $default);
    }
}

if (! function_exists('citems')) {
    /** Get a CMS repeater's items (array of associative rows) by "page.section.key". */
    function citems(string $path): array
    {
        $raw = Content::val($path, '');
        $arr = json_decode($raw, true);

        return is_array($arr) ? $arr : [];
    }
}

if (! function_exists('cimg')) {
    /** Get a CMS image URL by "page.section.key". */
    function cimg(string $path, ?string $default = null): string
    {
        return media(Content::val($path, ''), $default);
    }
}

if (! function_exists('media')) {
    /**
     * Resolve an image path to a usable URL.
     * - http(s)://...        -> as-is
     * - assets/...           -> public asset (shared frontend assets)
     * - anything else        -> storage/ (admin-uploaded files)
     */
    function media(?string $path, ?string $default = null): string
    {
        if (! $path) {
            return $default ? asset($default) : '';
        }
        if (str_starts_with($path, 'http')) {
            return $path;
        }
        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }
        return asset('storage/' . ltrim($path, '/'));
    }
}
