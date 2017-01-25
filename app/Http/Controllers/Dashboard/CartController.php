<?php

namespace borg\Http\Controllers\Dashboard;

use borg\Http\Requests\AddingProductsCart;
use borg\Itens;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addItem(AddingProductsCart $request){
        $item = Itens::find($request->item_id);

        Cart::add($item->id, $item->title, $request->qtd, $item->price );

        Session::flash('success', 'Item adicionado ao carrinho com sucesso! Clique <a href="'.url('dashboard/mercado/cart').'">AQUI</a> para visualizar');
        return back();
    }

    public function cart(){
        ///return Cart::content();
        return view('market.cart.view');
    }

    public function cartDelete($rowId){
        Cart::remove($rowId);

        return back();
    }

    public function addProduct(Request $request){
        $item = Itens::find($request->product_id);
        $between = ($item->quantity ?? $item->weight);
        $this->validate($request, [
            'program' => 'required|in:weekly,monthly,unique,biweekly',
            'fornecedor' => 'required|numeric',
            'product_id' => 'required|numeric',
            'qtd' => "required|integer|between:0,{$between}"
        ]);
        $product = [
            'name' => $item->title,
            'id' => $item->id,
            'price' => $item->price,
            'qty' => $request->qtd,
            'options' => [
                'program' => $request->program,
                'fornecedor' => $request->fornecedor
            ]
        ];
        Cart::add($product);

        Session::flash('success', 'Item adicionado ao carrinho com sucesso! Clique <a href="'.url('dashboard/mercado/cart').'">AQUI</a> para visualizar');
        return back();
    }
}
