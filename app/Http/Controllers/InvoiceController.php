<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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

        $invoices = Invoice::with('order')->where("user_id", "=", Auth::user()->id)->when($search, function ($query) use ($search) {
            return $query->where('id', 'like', '%' . $search . '%');
        })->orderBy($by, $sort)->paginate($per_page)->onEachSide(1);

        return view("client.invoices.index", compact("invoices", "sort", "by"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        abort_if(!Auth::user()->supperadmin() && $invoice->user_id != Auth::user()->id, \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));
        $invoice->load('order');
        return $invoice;
        return view("invoices.show", compact("invoice"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function print(Invoice $invoice)
    {
        abort_if(!Auth::user()->admin() && $invoice->user_id != Auth::user()->id, \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));

        $invoice->load(["order", "user"]);
        $invoice->order->load("user");

        $fileName = "{$invoice->id}.pdf";
        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4', // A4, [400, 180], 'Legal',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            "margin_bottom" => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);
        $html = View::make('pdf.invoice', compact('invoice'));
        $html = View::make('pdf.invoice', compact('invoice'));
        $html = $html->render();
        $pdf->WriteHTML($html);
        $pdf->Output($fileName, "I");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function download(Invoice $invoice)
    {
        abort_if(!Auth::user()->admin() && $invoice->user_id != Auth::user()->id, \Illuminate\Http\Response::HTTP_NOT_FOUND, __("Not Found."));

        $invoice->load(["order", "user"]);
        $invoice->order->load("user");

        $fileName = "{$invoice->id}.pdf";
        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4', // A4, [400, 180], 'Legal',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            "margin_bottom" => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
        ]);
        $html = View::make('pdf.invoice', compact('invoice'));
        $html = View::make('pdf.invoice', compact('invoice'));
        $html = $html->render();
        $pdf->WriteHTML($html);
        $pdf->Output($fileName, "D");
    }
}
