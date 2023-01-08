<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Invoice;
use GuzzleHttp\Psr7\Request;
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
    public function invoice(Request $request)
    {
        // $orders = Order::limit(50)->get();
        $fileName = 'Orders_List.pdf';
        $invoice = new Mpdf([
            'mode' => 'utf-8',
            'mode' => 'utf-8',
            // 'format' => 'A4-L',
            // 'format' => 'A4-L',
            'format' => [400, 180],
            // 'format' => 'A4-L',
            // 'format' => 'Legal',
            // 'margin_left' => 10,
            // 'margin_right' => 10,
            // 'margin_top' => 15,
            // "margin_bottom" => 20,
            // 'margin_header' => 10,
            // 'margin_footer' => 10,
            // 'margin_left' => 0,
            // 'margin_right' => 0,
            // 'margin_top' => 0,
            // "margin_bottom" => 0,
        ]);
        $html = View::make("pdf.demo");
        $html = $html->render();
        $invoice->WriteHTML($html);
        $invoice->Output($fileName, "D");
    }
}
