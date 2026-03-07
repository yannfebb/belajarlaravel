<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('index', function () {
    return view('index');
});
Route::resource('/blogs', BlogController::class);
=======
Route::get('/', function () {
    return view('welcome');
});Route::get('/', function () {
    return view('welcome');
});Route::get('/', function () {
    return view('welcome');
});Route::get('/', function () {
    return view('welcome');
});Route::get('/', function () {
    return view('welcome');
});Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 0d95ba9401b15ba9d0635dcd9e234330bd339d93
