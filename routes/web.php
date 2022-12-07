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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/article', ArticleController::class);
    Route::post('upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
    Route::resource('/report', ReportController::class);
    Route::get('/report-done', [ReportController::class, 'isDone']);
});


=======
>>>>>>> 06b3d0903675ddce5b48f4248736abd08494120c
require __DIR__ . '/auth.php';
