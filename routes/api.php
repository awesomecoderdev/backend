<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FrontendController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WebHook\WebHookController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::any('/', [FrontendController::class, 'index'])->middleware("throttle:60,1")->name('api.index');

// generate csrf token
Route::group(['prefix' => 'v1', "controller" => AuthController::class,], function () {
    Route::any('/', [FrontendController::class, 'v1'])->name('api.v1');
    Route::any('csrf', [CsrfCookieController::class, 'show'])->middleware('web')->name('csrf');
    Route::get('language/{lang?}', [LanguageController::class, "change"])->name("change.language");
});

// protected routes
Route::group(['prefix' => 'v1/user', "controller" => AuthController::class,], function () {
    // public routes
    Route::any('ping', 'user')->name('ping');
    Route::post('login', 'login')->middleware('guest')->name('login');
    Route::post('register', 'register')->middleware('guest')->name('register');

    // private routes
    Route::post('/', 'user')->middleware(['auth',])->name('user');
    Route::post('logout', 'logout')->middleware('auth')->name('api.logout');
    Route::post('/verify-email/{id}/{hash}', "verification")->middleware(['auth', 'signed', 'throttle:60,1'])->name('verification.verify');
    Route::post('/resend-verification', 'resendVerification')->middleware(['auth'])->name('verification.resend');

    // notifications
    Route::post('notifications', 'notifications')->name('notifications');
    Route::post('marknotification', 'markAsReadNotification')->name('markAsReadNotification');

    // websites
    // Route::post("websites", "websites")->middleware('auth')->name('websites');

});

// oauth routes
Route::group(['prefix' => 'v1/oauth', "controller" => AuthController::class,], function () {
    Route::post('{driver}', 'oauth')->name('oauth.login');
    Route::get('{driver}/callback', 'oauthCallback')->name('oauth.callback');
});

// cart routes
Route::group(['prefix' => 'v1/cart', "controller" => CartController::class,], function () {
    Route::post("/",  "cart")->name("cart");
    Route::post("add",  "add")->name("cart.add");
    Route::post("update",  "update")->name("cart.update");
    Route::post("remove",  "remove")->name("cart.remove");
});

// webhook routes
Route::any("v1/webhook", [WebHookController::class, "handle"])->middleware("throttle:60,1")->name("webhook");

// charts routes
Route::group(['prefix' => 'v1/chart', 'as' => 'chart', "controller" => ChartController::class,], function () {
    Route::post("orders", "orders")->name('orders');
});
