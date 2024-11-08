<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function orderRequest()
    {
        return view('orders.request');
    }

    public function viewSales()
    {
        return view('orders.sales');
    }

    public function viewTransactions()
    {
        return view('orders.transaction');
    }
}
