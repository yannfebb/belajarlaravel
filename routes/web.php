<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogUserController;

Route::get('/', function () {
    return view('public.home');
});
Route::get('/about', function () {
    return view('public.about');
});

Route::get('/blog', [BlogUserController::class, 'index'])->name('blog.user.index');
Route::get('/blog/{slug}', [BlogUserController::class, 'show'])->name('blog.user.show');



Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    // Guest Only (Hanya bisa diakses sebelum login)
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'store'])->name('login.store');

        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    });

    // Auth Protected (Hanya bisa diakses setelah login)
    Route::middleware(['auth'])->group(function () {
        Route::resource('blog', BlogController::class);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        // Redirect dashboard ke blog index jika ingin simpel
        Route::get('/dashboard', function () {
            return redirect()->route('blog.index');
        })->name('dashboard');
    });
});
