<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Jobs\SendProductShippedMail;

class EmailsController extends Controller
{
    public function index()
    {
        $order = Order::first();
        
        SendProductShippedMail::dispatch($order);
    }
}
