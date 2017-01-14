<?php

namespace borg\Http\Controllers\Api\Admin;

use borg\Orders;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        return Orders::with('user', 'orderItens')->get();
    }
}
