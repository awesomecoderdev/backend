<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as JsonResponse;
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
    Route::post('/', 'index')->middleware('auth')->name('user');
    Route::post('logout', 'destroy')->middleware('auth')->name('logout');

    // protected routes
    Route::post('login', 'auth')->middleware('guest')->name('login');
    Route::post('register', 'store')->middleware('guest')->name('register');
});
