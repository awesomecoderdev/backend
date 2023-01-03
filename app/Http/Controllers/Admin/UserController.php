<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $status = ($request->has('status') && in_array($request->input('status'), ['activated', 'pending', 'deactivated'])) ? strtolower($request->input('status')) : false;
        $by = ($request->has('by') && in_array($request->input('by'), ['created_at', 'id',])) ? strtolower($request->input('by')) : 'created_at';
        $sort = ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc',])) ? strtolower($request->input('sort')) : 'desc';

        if ($user->supperadmin()) {
            $users = User::where('id', '!=', Auth::user()->id)->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })->orderBy($by, $sort)->paginate(50)->onEachSide(1);
        } else {
            $users = User::where('id', '!=', Auth::user()->id)->where("isAdmin", "=", false)->where("isSupperAdmin", "=", false)->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })->orderBy("created_at", $sort)->paginate(50)->onEachSide(1);
        }

        return view("users.index", compact("users", "status", "sort"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Unauthorized Access."));
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        return $request->all();
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
        return $user;
    }
}
