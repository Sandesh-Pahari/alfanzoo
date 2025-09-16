<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\Admin\TableAdminController;
use App\Http\Controllers\Admin\BookingAdminController;

// ---------------- Home ----------------
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ---------------- Profile ----------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ---------------- Contact ----------------
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'submitContactForm'])->name('contact.send');

// ---------------- Admin Dashboard ----------------
Route::middleware(['auth', 'verified'])->get('/admindashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('contacts', ContactAdminController::class);
    Route::resource('booking', BookingAdminController::class);
    Route::resource('table', TableAdminController::class);

});

// ---------------- About ----------------
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/admin/about', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/admin/about/{id}', [AboutController::class, 'update'])->name('about.update');
});

// ---------------- Menu ----------------
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store')->middleware('auth');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('auth');

// ---------------- Gallery ----------------
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::middleware('auth')->group(function () {
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

// ---------------- Rooms ----------------
// ✅ Important: put /rooms/create before /rooms/{room} to avoid conflicts
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

// Auth-protected
Route::middleware('auth')->group(function () {
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
});

// Public show must be placed AFTER /rooms/create
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');


// Booking form for a specific room
Route::get('/booking/{room}', [BookingController::class, 'create'])->name('booking.create');

// Store booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
 
Route::controller(FaqController::class)->group(function () {
    // Publicly accessible route
    Route::get('faqs', 'index')->name('faqs.index');

    // Authenticated and verified routes
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('faqs/create', 'create')->name('faqs.create');
        Route::post('faqs', 'store')->name('faqs.store');
        Route::get('faqs/{faq:slug}/edit', 'edit')->name('faqs.edit');
        Route::put('faqs/{faq:slug}', 'update')->name('faqs.update');
        Route::delete('faqs/{faq:slug}', 'destroy')->name('faqs.destroy');
    });
});

Route::get('/book-table', [TableController::class, 'create'])->name('table.create');
Route::post('/book-table', [TableController::class, 'store'])->name('table.store');


require __DIR__.'/auth.php';
