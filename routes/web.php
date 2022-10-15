<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {

    // $user = [
    //     'email' => "awesomecoder.dev@gmail.com",
    //     'password' => "ibrahim21",
    // ];


    // echo '<pre>';
    // print_r(Auth::user());
    // echo '</pre>';

    // if (!Auth::guard('web')->attempt([
    //     "email" => "awesomecoder.org@gmail.com",
    //     "password" => "ibrahim21"
    // ], true)) {
    //     // $user = User::create([
    //     //     'name' => request('name'),
    //     //     'email' => request('email'),
    //     // ]);

    //     // Auth::guard('web')->login($user);

    //     echo "not Loged in";
    // } else {
    //     echo "loged in";
    // }

    return view('welcome');
});


Route::any('/login', function (Request $request) {
    if (Auth::attempt($request->only("email", "password"), true)) {
        return redirect("/");
        // echo "loged in";
    } else {
        echo "something went wrong";
    }
})->name("ll");
