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

    public function update($id, Request $request){

        $order = Orders::find($id);

        $order->status = $request->status;

        $order->save();

        return response()->json(['message' => 'Status do pedido atualizado com sucesso'], 200);
    }
}
