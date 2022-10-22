<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\API\AuthController;
use App\Http\Requests\VerifyEmailVerificationRequest;
use Illuminate\Http\Response as JsonResponse;
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

// generate csrf token
Route::get('csrf', [CsrfCookieController::class, 'show'])->middleware('web')->name('csrf');

// protected routes
Route::group(['prefix' => 'user', "controller" => AuthController::class,], function () {
    // public routes
    Route::post('login', 'login')->middleware('guest')->name('login');
    Route::post('register', 'register')->middleware('guest')->name('register');

    // private routes
    Route::post('/', 'user')->middleware(['auth', 'verified'])->name('user');
    Route::post('logout', 'logout')->middleware('auth')->name('logout');
    Route::post('/verify-email/{id}/{hash}', "verification")->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

    // demo
    // Route::post("websites", "websites")->middleware('auth')->name('websites');
});
