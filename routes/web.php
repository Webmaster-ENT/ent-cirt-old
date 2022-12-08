<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/article', ArticleController::class);
    Route::post('upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
    Route::resource('/report', ReportController::class);
    Route::get('/report-done', [ReportController::class, 'isDone']);
});


require __DIR__ . '/auth.php';
