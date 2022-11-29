<?php

use App\Http\Controllers\Admin\FrontendController;
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
