<?php

namespace App\Http\Controllers\Admin;

use Mpdf\Mpdf;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $by = ($request->has('by') && in_array($request->input('by'), ['created_at', 'id',])) ? strtolower($request->input('by')) : 'created_at';
        $sort = ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc',])) ? strtolower($request->input('sort')) : 'desc';
        $search = $request->has('search') ? $request->input('search') : false;
        $per_page = Cache::get('per_page', 50);

        $invoices = Invoice::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%')->orWhere('url', 'like', '%' . $search . '%');
        })->orderBy($by, $sort)->paginate($per_page)->onEachSide(1);

        return view("invoices.index", compact("invoices", "sort", "by"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Unauthorized Access."));
        return view("invoices.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        // if (Auth::user()->supperadmin()) {
        //     // $user->load('websites', 'products', 'orders');
        //     $user->load('products',);
        // }
        // $user->load('websites', 'orders');
        return $invoice;
        return view("invoices.show", compact("invoice"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        return view("invoices.edit", compact("invoice"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        try {
            $invoice->save();
            return redirect()->route("invoices.edit", $invoice)->with([
                "success" => __("The invoice successfully updated.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("invoices.edit", $invoice)->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        abort_if(!Auth::user()->supperadmin(), \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        try {
            $invoice->delete();
            return redirect()->route("invoices.index")->with([
                "success" => __("The invoice successfully deleted.")
            ]);
        } catch (\Exception $e) {
            return redirect()->route("invoices.index")->withErrors([
                "warning" => $e->getMessage(),
            ]);
        }
    }
}
