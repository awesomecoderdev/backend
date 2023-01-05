<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Response;
use AwesomeCoder\ShoppingCart\Facades\Cart;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Response as JsonResponse;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Requests\VerifyEmailVerificationRequest;
use App\Models\Order;
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

URL::forceScheme('https');

// change language
Route::get('language/{lang?}', [FrontendController::class, "language"])->name("language.change");

// change paginator
Route::get('paginator/{per_page?}', [FrontendController::class, "paginator"])->name("paginator.change");

// index route
Route::get('/', [FrontendController::class, "index"])->name('index');

// users
Route::resource("users", UserController::class);
Route::post('logout', [FrontendController::class, 'logout'])->middleware('auth')->name('logout'); // logout

// products
Route::resource("products", ProductController::class);

// orders
Route::resource("orders", OrderController::class);

// websites
Route::resource("websites", WebsiteController::class);

// settings
Route::get('settings', [FrontendController::class, "settings"])->name('settings');

// others
Route::get('payments', [FrontendController::class, "welcome"])->name('payments');
Route::get('invoice', [FrontendController::class, "welcome"])->name('invoice');
Route::get('inbox', [FrontendController::class, "welcome"])->name('inbox');

// scripts
Route::any('js/chunk_{time}.js', [FrontendController::class, "chunk"])->name('chunk');

Route::any("pdf", function () {
    // $orders = Order::limit(50)->get();
    $fileName = 'Orders_List.pdf';
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'mode' => 'utf-8',
        // 'format' => 'A4-L',
        // 'format' => 'A4-L',
        'format' => [400, 180],
        // 'format' => 'A4-L',
        // 'format' => 'Legal',
        // 'margin_left' => 10,
        // 'margin_right' => 10,
        // 'margin_top' => 15,
        // "margin_bottom" => 20,
        // 'margin_header' => 10,
        // 'margin_footer' => 10,
        // 'margin_left' => 0,
        // 'margin_right' => 0,
        // 'margin_top' => 0,
        // "margin_bottom" => 0,
    ]);
    $html = View::make("pdf.demo");
    $html = $html->render();
    $mpdf->WriteHTML($html);
    $mpdf->Output($fileName, "I");
});
