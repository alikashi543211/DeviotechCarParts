<?php

namespace App\Exports;

use Laravel\Cashier\Order\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderPaymentExcelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('admin.exports.paymentOrder', [
            'payment_orders' => Order::with('owner')->get()
        ]);
    }
}
