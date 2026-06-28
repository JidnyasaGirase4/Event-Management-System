# Event Management System — Implementation Plan

> Tech stack: **Laravel (PHP)** · **MySQL** · **HTML5 / CSS3 / JavaScript**
> Estimated duration: **2–3 weeks**
> **Approach: Frontend design FIRST (unique, animated, premium) → then Laravel backend.**
> Progress: check off each `[ ]` as we complete it.

---

## Phase 0 — Frontend Design (DOING FIRST) 🎨

> Goal: a unique, premium, fully responsive design with custom animations,
> high-quality imagery, and icons. Built as static HTML/CSS/JS, structured so
> it ports cleanly into Laravel Blade later.

### Design System & Setup
- [x] Choose visual direction — **Modern Vibrant Gradient** (violet→pink)
- [x] Set up frontend folder structure (`/frontend/assets` → css, js)
- [x] Define CSS design tokens (colors, fonts, spacing, shadows, radius)
- [x] Import fonts (Sora + Inter) + Lucide icon set
- [x] Build reusable components (buttons, cards, navbar, footer)
- [x] Set up scroll-reveal (IntersectionObserver) + animated counters

### Pages (with animations & unique design)
- [x] **Home Page** — hero banner, about, categories, why-choose-us, featured packages, gallery preview, testimonials, CTA, footer
- [x] **About Us Page** — intro, story, mission, vision, values, team
- [x] **Services Page** — Wedding / Birthday / Corporate sections + process
- [x] **Packages Page** — package cards + category filter + Book Now
- [x] **Gallery Page** — masonry grid + category filter + lightbox
- [x] **Testimonials Page** — reviews, star ratings, rating summary
- [x] **Contact Page** — contact form + info + map
- [x] **Book Event Page** — multi-field booking form

### Polish
- [x] Hover effects, micro-interactions, transitions
- [x] Loading & scroll animations (custom IntersectionObserver)
- [x] Responsive (mobile menu, grid breakpoints) — built into CSS
- [x] Premium upgrade — Playfair serif headings, ivory palette, gold accents
- [x] Tightened vertical spacing across all sections
- [x] Final cross-browser / device review

> **Theme locked:** Emerald (#047857/#10B981) + Gold (#E0A82E) on ivory (#F7F3E9),
> Playfair Display (serif headings) + Sora + Inter. One unified design across all pages.
> No red / blue / pink. Brand: **Eventyx**.

✅ **Phase 0 (Frontend Design) COMPLETE** — next: Phase 1 Laravel backend.

---

## Phase 1 — Setup & Foundation

- [ ] Install Laravel (latest stable version)
- [ ] Configure `.env` (app name, URL, environment)
- [ ] Create MySQL database `event_management`
- [ ] Set DB connection in `.env` (host, db name, user, password)
- [ ] Initialize Git repository + add `.gitignore`
- [ ] Verify app runs (`php artisan serve`)
- [ ] Plan folder structure (controllers, models, views, public assets)

### Database Migrations
- [ ] `users` (id, name, email, password, role)
- [ ] `categories` (id, category_name, description)
- [ ] `packages` (id, category_id FK, package_name, price, description, image)
- [ ] `bookings` (id, customer_name, email, phone, event_type, package_id FK, event_date, guests, location, requirements, status)
- [ ] `inquiries` (id, name, email, phone, message)
- [ ] `gallery` (id, category_id FK, image, video)
- [ ] `testimonials` (id, customer_name, review, rating)
- [ ] Run `php artisan migrate`

### Models & Relationships
- [ ] `User` model (role handling)
- [ ] `Category` model — hasMany Packages, hasMany Gallery
- [ ] `Package` model — belongsTo Category, hasMany Bookings
- [ ] `Booking` model — belongsTo Package
- [ ] `Inquiry` model
- [ ] `Gallery` model — belongsTo Category
- [ ] `Testimonial` model

### Seeders
- [ ] Seed default categories: Wedding Events, Birthday Parties, Corporate Events
- [ ] Seed default admin user

---

## Phase 2 — Authentication & Admin Foundation

- [ ] Implement login / logout
- [ ] Add role-based access (admin vs customer) via middleware
- [ ] Protect admin routes
- [ ] Build admin dashboard layout (sidebar, header, content area)
- [ ] Dashboard statistics:
  - [ ] Total Bookings
  - [ ] Total Packages
  - [ ] Total Inquiries
  - [ ] Total Customers
- [ ] Change password functionality

---

## Phase 3 — Admin CRUD Modules

### Categories Management
- [ ] Add Category
- [ ] Edit Category
- [ ] Delete Category
- [ ] View / List Categories

### Package Management
- [ ] Add Package (name, category, price, description, image)
- [ ] Edit Package
- [ ] Delete Package
- [ ] View / List Packages
- [ ] Image upload handling

### Booking Management
- [ ] View Bookings list
- [ ] View single Booking details
- [ ] Update Booking Status (Pending / Confirmed / Completed / Cancelled)
- [ ] Delete Booking

### Inquiry Management
- [ ] View Inquiry list
- [ ] View single Inquiry
- [ ] Reply to Inquiry
- [ ] Delete Inquiry

### Gallery Management
- [ ] Upload Images
- [ ] Upload Videos
- [ ] Edit Media
- [ ] Delete Media

### Testimonials Management
- [ ] Add Testimonial
- [ ] Edit Testimonial
- [ ] Delete Testimonial

### User Management
- [ ] List users
- [ ] Manage users (add / edit / delete)

---

## Phase 4 — Frontend Public Pages

- [ ] Base layout (header, navigation, footer)
- [ ] **Home Page**
  - [ ] Hero Banner
  - [ ] About Company section
  - [ ] Event Categories
  - [ ] Why Choose Us
  - [ ] Featured Packages
  - [ ] Gallery Preview
  - [ ] Testimonials
  - [ ] Contact Information + Footer
- [ ] **About Us Page** (intro, mission, vision, team)
- [ ] **Services Page** (Wedding / Birthday / Corporate details)
- [ ] **Packages Page** (dynamic from DB + Book Now button)
- [ ] **Gallery Page** (photos, videos, category filter)
- [ ] **Testimonials Page** (reviews, ratings, event type)
- [ ] **Contact Page** (form: name, email, phone, event type, message)
- [ ] **Book Event Page** (full booking form -> saves to bookings)

---

## Phase 5 — Features, Polish & Testing

- [ ] Responsive / mobile-friendly styling
- [ ] SEO meta tags + friendly URLs
- [ ] Search & filter functionality
- [ ] Contact form validation (client + server side)
- [ ] Booking form validation
- [ ] Image upload validation (type/size)
- [ ] Cross-browser testing
- [ ] Mobile device testing
- [ ] Bug fixes and final review

---

## Phase 6 — Deployment

- [ ] Production environment configuration
- [ ] Migrate database to production
- [ ] Configure storage / file permissions
- [ ] Final QA pass
- [ ] Handover / documentation

---

## Progress Log

| Date | Phase | Notes |
|------|-------|-------|
| 2026-06-24 | — | Plan created |
