<?php

use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Response;
use AwesomeCoder\ShoppingCart\Facades\Cart;
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

// change language
Route::get('language/{lang?}', [FrontendController::class, "language"])->name("language.change");

// index route
Route::get('/', [FrontendController::class, "index"])->name('index');

// users
Route::resource("users", UserController::class);

Route::get('websites', [FrontendController::class, "index"])->name('websites');
Route::get('payments', [FrontendController::class, "index"])->name('payments');
Route::get('invoice', [FrontendController::class, "index"])->name('invoice');
Route::get('settings', [FrontendController::class, "index"])->name('settings');
Route::get('inbox', [FrontendController::class, "index"])->name('inbox');
