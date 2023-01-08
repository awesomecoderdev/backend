<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        $search = $request->has('search') ? $request->input('search') : false;
        $per_page = Cache::get('per_page', 50);

        if ($user->supperadmin()) {
            $users = User::where('id', '!=', Auth::user()->id)->when($search, function ($query) use ($search, $status) {
                if ($status) {
                    return $query->where('status', $status)->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');
                }
                return $query->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');
            })->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })->orderBy($by, $sort)->paginate($per_page)->onEachSide(1);
        } else {
            $users = User::where('id', '!=', Auth::user()->id)->where("isAdmin", "=", false)->where("isSupperAdmin", "=", false)->when($search, function ($query) use ($search, $status) {
                if ($status) {
                    return $query->where('status', $status)->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');
                }
                return $query->where('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');
            })->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })->orderBy("created_at", $sort)->paginate($per_page)->onEachSide(1);
        }

        return view("users.index", compact("users", "status", "sort", "by"));
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
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Invalid user id."));
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
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        try {
            $user->save();
            return redirect()->route("users.edit", $user)->with([
                "success" => __("The user successfully updated.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("users.edit", $user)->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));

        try {
            $user->delete();
            return redirect()->route("users.index")->with([
                "success" => __("The user successfully deleted.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("users.index")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }
}
