<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view('index');
});
Route::get('/posts', [PostController::class, 'index']);

use App\Http\Controllers\BlogController;

Route::resource('blog', BlogController::class);
