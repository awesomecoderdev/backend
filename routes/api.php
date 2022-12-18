<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Response;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WebHook\WebHookController;
use Illuminate\Http\Response as JsonResponse;
use App\Http\Requests\VerifyEmailVerificationRequest;
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

// generate csrf token
Route::group(['prefix' => 'v1', "controller" => AuthController::class,], function () {
    Route::get('csrf', [CsrfCookieController::class, 'show'])->middleware('web')->name('csrf');
    Route::get('language/{lang?}', [LanguageController::class, "change"])->name("change.language");
});

// protected routes
Route::group(['prefix' => 'user', "controller" => AuthController::class,], function () {
    // public routes
    Route::any('ping', 'user')->name('ping');
    Route::post('login', 'login')->middleware('guest')->name('login');
    Route::post('register', 'register')->middleware('guest')->name('register');

    // private routes
    Route::post('/', 'user')->middleware(['auth',])->name('user');
    Route::post('logout', 'logout')->middleware('auth')->name('api.logout');
    Route::post('/verify-email/{id}/{hash}', "verification")->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/resend-verification', 'resendVerification')->middleware(['auth'])->name('verification.resend');

    // notifications
    Route::post('notifications', 'notifications')->name('notifications');
    Route::post('marknotification', 'markAsReadNotification')->name('markAsReadNotification');

    // websites
    // Route::post("websites", "websites")->middleware('auth')->name('websites');

});

// oauth routes
Route::group(['prefix' => 'oauth', "controller" => AuthController::class,], function () {
    Route::post('{driver}', 'oauth')->name('oauth.login');
    Route::get('{driver}/callback', 'oauthCallback')->name('oauth.callback');
});

// cart routes
Route::group(['prefix' => 'cart', "controller" => CartController::class,], function () {
    Route::post("/",  "cart")->name("cart");
    Route::post("add",  "add")->name("cart.add");
    Route::post("update",  "update")->name("cart.update");
    Route::post("remove",  "remove")->name("cart.remove");
});

// webhook routes
Route::any("webhook", [WebHookController::class, "handle"])->name("webhook");


// charts routes
Route::group(['prefix' => 'chart', 'as' => 'chart', "controller" => ChartController::class,], function () {
    Route::any("orders", "orders")->name('orders');
});
