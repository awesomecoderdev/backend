<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Response as JsonResponse;
use App\Http\Requests\VerifyEmailVerificationRequest;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
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

// base route
Route::get('/', function () {
    // echo route('oauth.login', 'google');
    phpinfo();
})->name('welcome');

// generate csrf token
Route::get('csrf', [CsrfCookieController::class, 'show'])->middleware('web')->name('csrf');

// protected routes
Route::group(['prefix' => 'user', "controller" => AuthController::class,], function () {
    // public routes
    Route::any('ping', 'user')->name('ping');
    Route::post('login', 'login')->middleware('guest')->name('login');
    Route::post('register', 'register')->middleware('guest')->name('register');

    // private routes
    Route::post('/', 'user')->middleware(['auth',])->name('user');
    Route::post('logout', 'logout')->middleware('auth')->name('logout');
    Route::post('/verify-email/{id}/{hash}', "verification")->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/resend-verification', 'resendVerification')->middleware(['auth'])->name('verification.resend');

    // demo
    // Route::post("websites", "websites")->middleware('auth')->name('websites');
});

// oauth routes
Route::group(['prefix' => 'oauth', "controller" => AuthController::class,], function () {
    Route::post('{driver}', 'oauth')->name('oauth.login');
    Route::get('{driver}/callback', 'oauthCallback')->name('oauth.callback');
});
