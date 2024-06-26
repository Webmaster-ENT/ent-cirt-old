<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingPageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/artikel', function () {
//     return view('article');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('artikel/{article:slug}', [LandingPageController::class, 'show'])->name('artikel.show');
Route::post('reportstore', [ReportController::class, 'store'])->name('report.store');

/* storage-link */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
        Route::resource('/article', ArticleController::class);

        // Route::post('upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::get('/report/done', [ReportController::class, 'isDone'])->name('report.isDone');
        Route::put('/report/update/{id}', [ReportController::class, 'updateDone'])->name('report.update');
    });
});


require __DIR__ . '/auth.php';
