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

require __DIR__.'/auth.php';
