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
    // echo '<pre>';
    // print_r(Auth::user()->name);
    // echo '</pre>';

    return view('welcome');
});


Route::post('/login', function (Request $request) {
    // dd(Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']]));

    $userdata = array(
        'password'  => $request->input('password'),
        'email'     => $request->input('email')
    );


    // attempt to do the login
    if (Auth::attempt($userdata, true)) {
        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        //return Redirect::to('Home');
        // echo 'SUCCESS!';
        // echo  Auth::user()->uname;
        return redirect("/");
    } else {

        // validation not successful, send back to form
        echo "string";
    }

    if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        dd(['fail' => 'Could Not Log You In']);
    }


    // if (Auth::attempt($request->only("email", "password"), true)) {
    //     return redirect("/");
    //     // echo "loged in";
    // } else {
    //     echo "something went wrong";
    // }
})->name("ll");
