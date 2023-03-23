<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\WishlistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin/login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin/authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin/logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin/dashboard')->middleware('admin');
});

Route::middleware(['throttle:global'])->group(function () {
    Route::get('/', [SiteController::class, 'main'])->name('home');
    Route::get('/about-us', [SiteController::class, 'about'])->name('about');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
    Route::resources([
        'comments' => CommentController::class,
        'blogs' => BlogController::class,
        'product' => ProductController::class,
        'wishlist' => WishlistController::class,
        'order' => OrderController::class,
        'compare' => CompareController::class,
        'checkout' => CheckoutController::class,
        'faq' => FaqController::class,
    ]);
});

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('language/{locale}', [LangController::class, 'change_locale'])->name('locale.change');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'password.confirm'])->name('dashboard');

Route::middleware('auth', 'password.confirm', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products/{menu}/{id?}/{submenu?}', [ProductController::class, 'product'])->name('product');

require __DIR__ . '/auth.php';
