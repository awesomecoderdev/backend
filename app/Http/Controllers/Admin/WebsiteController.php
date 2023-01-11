<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        $per_page = Cache::get('per_page', 50);

        $websites = Website::when($search, function ($query) use ($search, $status) {
            if ($status) {
                return $query->where('status', $status)->where('title', 'like', '%' . $search . '%')->orWhere('url', 'like', '%' . $search . '%');
            }
            return $query->where('title', 'like', '%' . $search . '%')->orWhere('url', 'like', '%' . $search . '%');
        })->when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })->orderBy($by, $sort)->paginate($per_page)->onEachSide(1);

        return view("websites.index", compact("websites", "status", "sort", "by"));
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
        abort_if(!Auth::user()->admin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
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

        try {
            $website->save();
            return redirect()->route("websites.edit", $website)->with([
                "success" => __("Website successfully updated.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("websites.edit", $website)->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
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

        try {
            $website->delete();
            return redirect()->route("websites.index")->with([
                "success" => __("Website successfully deleted.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("websites.index")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }
}
