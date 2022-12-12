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
    return view('article');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
        Route::resource('/article', ArticleController::class);

        // Route::get('/article/{article}', [ArticleController::class, 'show']);
        Route::post('upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::get('/report/done', [ReportController::class, 'isDone'])->name('report.isDone');
        Route::put('/report/update/{id}', [ReportController::class, 'updateDone'])->name('report.update');
    });
});


require __DIR__ . '/auth.php';
