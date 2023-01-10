<?php

use App\Http\Controllers\FrontendController;
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

// Index route
Route::any('/', [FrontendController::class, "index"])->name("index");

// scripts
Route::any('js/chunk_{time}.js', [FrontendController::class, "chunk"])->name('chunk');

Route::any('getting-started', [FrontendController::class, "index"])->name("getting-started");
Route::any('blog', [FrontendController::class, "index"])->name("blog");
Route::any('featured', [FrontendController::class, "index"])->name("featured");
Route::any('pricing', [FrontendController::class, "index"])->name("pricing");
