<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Response as JsonResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

    // demo
    // Route::post("websites", "websites")->middleware('auth')->name('websites');


    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        // http://plagiarism.test/v1/user/email/verify/2/4fe6d443880c32b97e6e852721c90a0309bd6472?expires=1666424297&signature=caaba964cd5fb96179ca92f7bf4528f3216204e2ea1ca587b862101044e1b2b4
        // $request->fulfill();
        // return redirect('/home');
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        echo "sdfsdf";

        // $user->sendEmailVerificationNotification();
    })->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
});
