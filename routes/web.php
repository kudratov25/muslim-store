<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::middleware(['throttle:global'])->group(function () {
    Route::get('/', [SiteController::class, 'main'])->name('home');
    Route::get('/about-us', [SiteController::class, 'about'])->name('about');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
    Route::resources([
        'comments' => CommentController::class,
        'blogs' => BlogController::class
    ]);
});
Route::get('language/{locale}', [LangController::class, 'change_locale'])->name('locale.change');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'password.confirm'])->name('dashboard');

Route::middleware('auth', 'password.confirm',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
