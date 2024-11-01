<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Order;
use App\Models\Billingdetails;
use App\Models\OrderProduct;

class PDFController extends Controller
{
    //pdfgenerat
    function view_invoice($orderId) {
        $order = Order::where('order_id', $orderId)->first();
        $billingdetails = Billingdetails::where('order_id', $orderId)->get();
        $OrderProducts = OrderProduct::where('order_id', $orderId)->get();

        $data = [
            'order' => $order,
            'billingdetails' => $billingdetails,
            'OrderProducts' => $OrderProducts,
        ];

        $pdf = PDF::loadView('backend.orders.view_invoice_print', $data);
        return $pdf->download('invoice.pdf');
    }
}
