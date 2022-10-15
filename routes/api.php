<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// generate csrf token
Route::get('csrf', [CsrfCookieController::class, 'show'])->middleware('web')->name('csrf');

// protected routes
Route::group(['prefix' => 'user', "controller" => AuthController::class,], function () {
    Route::get('/', 'index')->name('user');
    Route::post('register', 'store')->name('register');
    Route::post('login', 'auth')->name('login');
    Route::post('logout', 'destroy')->name('logout');
});
