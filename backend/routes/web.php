<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\InquiryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site (Eventyx)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/index.html', [PublicController::class, 'home']);

Route::view('/about', 'about');           Route::view('/about.html', 'about');
Route::view('/services', 'services');     Route::view('/services.html', 'services');
Route::get('/packages', [PublicController::class, 'packages']);
Route::get('/packages.html', [PublicController::class, 'packages']);
Route::get('/gallery', [PublicController::class, 'gallery']);
Route::get('/gallery.html', [PublicController::class, 'gallery']);
Route::get('/testimonials', [PublicController::class, 'testimonials']);
Route::get('/testimonials.html', [PublicController::class, 'testimonials']);
Route::get('/contact', [PublicController::class, 'contact']);
Route::get('/contact.html', [PublicController::class, 'contact']);
Route::get('/book', [PublicController::class, 'book']);
Route::get('/book.html', [PublicController::class, 'book']);

// public form submissions
Route::post('/contact', [PublicController::class, 'storeInquiry'])->name('contact.store');
Route::post('/book', [PublicController::class, 'storeBooking'])->name('book.store');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Page-wise content editor (Home, About, ... + Global)
    Route::get('/content/{page}', [ContentController::class, 'edit'])->name('content.edit');
    Route::post('/content/{page}', [ContentController::class, 'update'])->name('content.update');

    Route::resource('packages', PackageController::class)->except('show');
    Route::resource('testimonials', TestimonialController::class)->except('show');
    Route::resource('gallery', GalleryController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('categories', CategoryController::class)->except('show');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::patch('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
});
