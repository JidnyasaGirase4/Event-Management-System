# Eventyx — Event Management System

A full-stack event management platform for booking and managing events (weddings, birthdays, corporate functions). It pairs a premium, animated static frontend with a Laravel admin backend.

🔗 **Live demo (frontend):** https://eventyx-event-management.netlify.app
🔐 **Admin panel:** `http://localhost:8000/admin/login` *(runs locally — the Laravel backend is not deployed; see [Backend setup](#backend-laravel))*

> Tech stack: **Laravel 12 (PHP 8.2+)** · **MySQL** · **HTML5 / CSS3 / JavaScript**
> Approach: frontend design first → then Laravel backend.

---

## ✨ Features

### Public site
- **Home** — animated hero, categories, featured packages, gallery preview, testimonials, CTA
- **About / Services** — company story, mission, and service breakdown (Wedding / Birthday / Corporate)
- **Packages** — package cards with category filtering and "Book Now"
- **Gallery** — masonry grid with category filter and lightbox
- **Testimonials** — client reviews with star ratings
- **Contact & Booking** — inquiry and booking forms

### Admin panel (Laravel)
- Authenticated admin dashboard
- Manage packages, testimonials, gallery, and page content
- View and manage bookings and inquiries

### Design
- Custom design system (design tokens, Sora + Inter fonts, Lucide icons)
- Scroll-reveal animations (IntersectionObserver) and animated counters
- Fully responsive

---

## 📁 Project structure

```
Event Management System/
├── frontend/          # Static HTML/CSS/JS site (deployed to Netlify)
│   ├── *.html         # Home, About, Services, Packages, Gallery, etc.
│   └── assets/        # css, js, images
├── backend/           # Laravel 12 application
│   ├── app/           # Models, Controllers (Admin + Public)
│   ├── database/      # Migrations & seeders
│   ├── resources/     # Blade views
│   └── routes/        # web.php
├── plan.md            # Implementation plan
└── requirements.txt   # Project requirements
```

---

## 🚀 Getting started

### Frontend (static)
The frontend is plain HTML/CSS/JS — just open `frontend/index.html` in a browser, or serve the folder with any static server.

<a id="backend-laravel"></a>
### Backend (Laravel)

Requirements: PHP 8.2+, Composer, MySQL.

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then:
php artisan migrate --seed

php artisan serve
```

The app will be available at `http://localhost:8000` and the admin panel at `/admin/login`.

---

## 🌐 Deployment

- **Frontend** is deployed to **Netlify** from the `frontend/` directory: https://eventyx-event-management.netlify.app
- **Backend** (Laravel) requires a PHP host (e.g. shared hosting, Render, Railway, or a VPS) with a MySQL database. Netlify does not run PHP.

---

## 📄 License

This project is provided for educational and portfolio purposes.
