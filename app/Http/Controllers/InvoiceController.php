<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function print(Invoice $invoice)
    {
        $invoice->load("order");
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
        // return $html = View::make('pdf.invoice', compact('invoice'));
        $html = $html->render();
        $pdf->WriteHTML($html);
        $pdf->Output($fileName, "I");
    }
}
