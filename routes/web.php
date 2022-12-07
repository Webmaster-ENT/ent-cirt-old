<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dshbrd', function () {
    return view('layouts.dashbord.index');
});

Route::get('/all-article', function () {
    return view('layouts.dashbord.all-article');
});

Route::get('/create-article', function () {
    return view('layouts.dashbord.create-article');
});

Route::get('/all-pengaduan', function () {
    return view('layouts.dashbord.all-pengaduan');
});

Route::get('/article', function () {
    return view('article');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
