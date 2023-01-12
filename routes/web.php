<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;

//auth
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\InvoiceController as ClientInvoiceController;

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

URL::forceScheme('https');


// change language
Route::any('language/{lang?}', [FrontendController::class, "language"])->name("client.language.change");

// change paginator
Route::any('paginator/{per_page?}', [FrontendController::class, "paginator"])->name("client.paginator.change");


// Index route
Route::any('/', [FrontendController::class, "index"])->name("index");

// scripts
Route::any('js/chunk_{time}.js', [FrontendController::class, "chunk"])->name('chunk');
Route::any('js/props_{time}.js', [FrontendController::class, "alpine"])->withoutMiddleware("speedbooster")->name('alpine');

Route::any('getting-started', [FrontendController::class, "gettingstarted"])->name("getting-started");
Route::any('blog', [FrontendController::class, "blog"])->name("blog");
Route::any('featured', [FrontendController::class, "featured"])->name("featured");
Route::any('pricing', [FrontendController::class, "pricing"])->name("pricing");

// auth routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});




Route::middleware(['auth', 'verified'])->group(function () {
    Route::any('dashboard', [FrontendController::class, "dashboard"])->name("client.dashboard");
    // orders
    Route::resource("orders", OrderController::class, ["as" => "client"])->only(["index", "show"]);
    // websites
    Route::resource("websites", WebsiteController::class, ["as" => "client"]);
    // invoice
    Route::resource("invoices", InvoiceController::class, ["as" => "client"])->only(["index", "show"]);
    Route::get("invoices/{invoice}/print/", [InvoiceController::class, "print"])->name("client.invoices.print");
    Route::get("invoices/{invoice}/download/", [InvoiceController::class, "download"])->name("client.invoices.download");
    // payments
    Route::resource("payments", PaymentController::class, ["as" => "client"])->only(["index", "show"]);
    // settings
    Route::get('settings', [FrontendController::class, "dashboard"])->name('client.settings');
    // others
    Route::get('support', [FrontendController::class, "dashboard"])->name('client.support');
});
