<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// IMPORT CONTROLLER
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\MinistryController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\GalleryController; // <-- IMPORT BARU

// ==========================================================
// RUTE PUBLIK
// ==========================================================
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/berita', [HomeController::class, 'beritaIndex'])->name('berita.index');
Route::get('/berita/{post:slug}', [HomeController::class, 'show'])->name('berita.show');
Route::get('/kategori/{category:slug}', [HomeController::class, 'categoryPosts'])->name('kategori.posts');

// ==========================================================
// RUTE DASHBOARD
// ==========================================================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTE BERITA (Semua user login)
    Route::resource('/dashboard/posts', PostController::class)->names('posts');

    // --- RUTE KHUSUS SUPERADMIN ---
    Route::middleware('can:isSuperAdmin')->group(function () {

        Route::resource('/dashboard/categories', CategoryController::class)->names('categories');
        Route::get('/dashboard/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/dashboard/settings', [SettingController::class, 'update'])->name('settings.update');
        Route::resource('/dashboard/ministries', MinistryController::class)->names('ministries');
        Route::resource('/dashboard/partners', PartnerController::class)->names('partners');

        // RUTE BARU: GALERI
        Route::resource('/dashboard/galleries', GalleryController::class)->names('galleries');

    });
    // --- Akhir Rute SuperAdmin ---

});

require __DIR__.'/auth.php';
