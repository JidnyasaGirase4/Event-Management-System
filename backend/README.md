# Eventyx — Backend (Laravel)

This folder holds the **Blade** version of the frontend. The design, HTML, CSS,
and JS are **identical** to `/frontend` — the pages were copied verbatim and
only given the `.blade.php` extension.

## Structure

```
backend/
├── public/
│   └── assets/            ← JUNCTION → ../../frontend/assets (same files, not copies)
│       ├── css/style.css
│       ├── js/main.js
│       └── images/        ← all 25 local images
├── resources/
│   └── views/             ← Blade views (one per page)
│       ├── index.blade.php
│       ├── about.blade.php
│       ├── services.blade.php
│       ├── packages.blade.php
│       ├── gallery.blade.php
│       ├── testimonials.blade.php
│       ├── contact.blade.php
│       └── book.blade.php
└── routes/
    └── web.php            ← maps each page URL to its view
```

## Notes
- `public/assets` is a **directory junction** to `/frontend/assets`, so the
  backend uses the **same** CSS/JS/images as the frontend — edit once, both
  update. (Re-create with:
  `New-Item -ItemType Junction -Path backend\public\assets -Target frontend\assets`)
- Asset paths (`assets/css/...`, `assets/js/...`, `assets/images/...`) resolve
  correctly because Laravel serves everything in `public/` from the web root.
- The existing navigation links (`about.html`, `index.html`, …) keep working —
  `routes/web.php` maps those URLs to the right views. Clean URLs
  (`/about`, `/services`, …) are also wired up.

## Next step (Phase 1)
This is the view layer. To make it a full running Laravel app we still need to
install the Laravel framework here (composer), then add:
- Database migrations + models (users, categories, packages, bookings, …)
- Controllers + the admin panel
- Wiring the Contact & Book forms to save to the database
