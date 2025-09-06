<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ContactAdminController;

// Route::get('/', function () {
//     return view('template.template');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'submitContactForm'])->name('contact.send');

Route::middleware(['auth', 'verified'])->get('/admindashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('contacts', ContactAdminController::class);
});

use App\Http\Controllers\AboutController;

// Public route (anyone can view About Us)
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Auth-protected routes (only logged-in users can create/edit)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/admin/about', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/admin/about/{id}', [AboutController::class, 'update'])->name('about.update');
});

require __DIR__.'/auth.php';
