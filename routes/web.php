<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

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

Route::any('/', function () {
    $img = file_get_contents(public_path("logo.png"));
    // $img = file_get_contents("https://awesomecoderdev.github.io/img/profile.jpg");
    $img = base64_encode($img);
    return "<img  id='base64image'
    src='data:image/svg;base64,$img' />";
});

// invoice
// Route::post('invoices/{id}/{hash}', "verification")->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
// Route::get('invoices/{id}/{hash}', [InvoiceController::class, "invoice"])->middleware(['auth', 'throttle:6,1'])->name('invoices.demo');
// Route::any('invoice/download/', [InvoiceController::class, "invoice"])->middleware(['auth', 'throttle:6,1'])->name('invoices.demo');
