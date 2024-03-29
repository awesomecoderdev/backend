<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Response;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Response as JsonResponse;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\InvoiceController as ClientInvoiceController;
use App\Http\Requests\VerifyEmailVerificationRequest;
use App\Models\Order;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

URL::forceScheme('https');

// change language
Route::any('language/{lang?}', [FrontendController::class, "language"])->name("language.change");

// change paginator
Route::any('paginator/{per_page?}', [FrontendController::class, "paginator"])->name("paginator.change");

// index route
Route::get('/', [FrontendController::class, "index"])->name('admin.index');
Route::get('dashboard', [FrontendController::class, "index"])->name('admin.dashboard');

// users
Route::resource("users", UserController::class);
Route::post('logout', [FrontendController::class, 'logout'])->middleware('auth')->name('admin.logout'); // logout

// products
Route::resource("products", ProductController::class);

// orders
Route::resource("orders", OrderController::class);

// websites
Route::resource("websites", WebsiteController::class);

// invoice
Route::resource("invoices", InvoiceController::class);
Route::get("invoices/{invoice}/print/", [ClientInvoiceController::class, "print"])->name("invoices.print");

// settings
Route::get('settings', [FrontendController::class, "settings"])->name('settings');


// others
Route::get('payments', [FrontendController::class, "welcome"])->name('payments');
Route::get('inbox', [FrontendController::class, "inbox"])->name('inbox');
Route::get('inbox/{user}', [FrontendController::class, "messages"])->name('inbox.show');

// scripts
Route::any('js/chunk_{time}.js', [FrontendController::class, "chunk"])->name('admin.chunk');
Route::any('js/props_{time}.js', [FrontendController::class, "alpine"])->withoutMiddleware(["speedbooster", "admin"])->name('admin.alpine');
