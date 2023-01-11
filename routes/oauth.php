
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::any("/", function () {
    return "oauth";
});

// oauth routes
Route::group(['prefix' => 'oauth', "controller" => AuthController::class,], function () {
    Route::any('{driver}', 'oauth')->name('oauth.login');
    Route::get('{driver}/callback', 'oauthCallback')->name('oauth.callback');
});
