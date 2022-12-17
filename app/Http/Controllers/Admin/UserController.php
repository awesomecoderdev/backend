<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->supperadmin()) {
            $users = User::where('id', '!=', Auth::user()->id)->paginate(50)->onEachSide(1);
        } else {
            $users = User::where('id', '!=', Auth::user()->id)->where("isAdmin", "=", false)->where("isSupperAdmin", "=", false)->paginate(50)->onEachSide(1);
        }
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(!Auth::user()->supperadmin() || Auth::user()->id == $user->id, \Illuminate\Http\Response::HTTP_NOT_FOUND, "Invalid user id.");
        if (Auth::user()->supperadmin()) {
            // $user->load('websites', 'products', 'orders');
            $user->load('products',);
        }
        $user->load('websites', 'orders');
        // return $user;
        return view("users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, "Invalid user id.");
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
