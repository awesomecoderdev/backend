
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// oauth routes
Route::group(["controller" => AuthController::class,], function () {

    Route::any("/", "index")->name("oauth.index");
    Route::any('{driver}', 'oauth')->name('oauth.login');
    Route::get('{driver}/callback', 'oauthCallback')->name('oauth.callback');
});
