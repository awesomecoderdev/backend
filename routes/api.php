<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChartController;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\API\FrontendController;
use Laravel\Cashier\Http\Controllers\WebhookController;
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
    Route::any('csrf', [CsrfCookieController::class, 'show'])->middleware('web')->name('api.csrf');
    Route::get('language/{lang?}', [LanguageController::class, "change"])->name("api.change.language");
});

// protected routes
Route::group(['prefix' => 'v1/user', "controller" => AuthController::class,], function () {
    // public routes
    Route::any('ping', 'user')->name('api.ping');
    Route::post('login', 'login')->middleware('guest')->name('api.login');
    Route::post('register', 'register')->middleware('guest')->name('api.register');

    // private routes
    Route::post('/', 'user')->middleware(['auth',])->name('api.user');
    Route::post('logout', 'logout')->middleware('auth')->name('api.logout');
    Route::post('/verify-email/{id}/{hash}', "verification")->middleware(['auth', 'signed', 'throttle:60,1'])->name('api.verification.verify');
    Route::post('/resend-verification', 'resendVerification')->middleware(['auth'])->name('api.verification.resend');

    // notifications
    Route::post('notifications', 'notifications')->name('api.notifications');
    Route::post('marknotification', 'markAsReadNotification')->name('api.markAsReadNotification');

    // websites
    // Route::post("websites", "websites")->middleware('auth')->name('websites');

});

// oauth routes
Route::group(['prefix' => 'v1/oauth', "controller" => AuthController::class,], function () {
    Route::any('{driver}', 'oauth')->name('api.oauth.login');
    Route::get('{driver}/callback', 'oauthCallback')->name('api.oauth.callback');
});

// cart routes
Route::group(['prefix' => 'v1/cart', "controller" => CartController::class,], function () {
    Route::post("/",  "cart")->name("api.cart");
    Route::post("add",  "add")->name("api.cart.add");
    Route::post("update",  "update")->name("api.cart.update");
    Route::post("remove",  "remove")->name("api.cart.remove");
});

// webhook routes
Route::post("v1/webhook/stripe", [WebhookController::class, "handleWebhook"])->middleware("throttle:60,1")->name("api.cashier.webhook");

// charts routes
Route::group(['prefix' => 'v1/chart', 'as' => 'chart', "controller" => ChartController::class,], function () {
    Route::post("orders", "orders")->name('api.orders');
});

// stripe listen --forward-to http://localhost:8000/webhook/stripe


// function lcs($X, $Y)
// {
//     $m = strlen($X);
//     $n = strlen($Y);
//     $L = array();

//     for ($i = 0; $i <= $m; $i++) {
//         for ($j = 0; $j <= $n; $j++) {
//             if ($i == 0 || $j == 0)
//                 $L[$i][$j] = 0;
//             else if ($X[$i - 1] == $Y[$j - 1])
//                 $L[$i][$j] = $L[$i - 1][$j - 1] + 1;
//             else
//                 $L[$i][$j] = max($L[$i - 1][$j], $L[$i][$j - 1]);
//         }
//     }
//     return $L[$m][$n];
// }

// function similarity_score($X, $Y)
// {
//     $lcs_length = lcs($X, $Y);
//     $max_length = max(strlen($X), strlen($Y));
//     return $lcs_length / $max_length;
// }

// // Test
// $X = "This is a test string, I love you";
// $Y = "This I is another love test you string ";
// $score = similarity_score($X, $Y);
// echo "Similarity Score: " . $score;