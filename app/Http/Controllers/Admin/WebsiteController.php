<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = ($request->has('status') && in_array($request->input('status'), ['approved', 'pending', 'blocked'])) ? strtolower($request->input('status')) : false;
        $by = ($request->has('by') && in_array($request->input('by'), ['created_at', 'id',])) ? strtolower($request->input('by')) : 'created_at';
        $sort = ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc',])) ? strtolower($request->input('sort')) : 'desc';
        $search = $request->has('search') ? $request->input('search') : false;

        $websites = Website::when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })->when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%')->orWhere('url', 'like', '%' . $search . '%');
        })->orderBy($by, $sort)->paginate(50)->onEachSide(1);

        return view("websites.index", compact("websites", "status"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        $website->load('user');
        return $website;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        $website->load('user');
        return $website;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));

        //
    }
}
