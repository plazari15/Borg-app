<?php

namespace borg\Http\Controllers\Dashboard;

use borg\Itens;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;

class MarketController extends Controller
{
    public function index(){
        $itens = Itens::whereNull('deleted_at')
                            ->with('product')
                            ->get();

        $itens = collect($itens);
        $itens = $itens->keyBy('product_id');

        $itens->all();

        return view('market.index', compact('itens'));
    }

    public function itemView($id)
    {
        $item = Itens::find($id);

        return view('market.item.view', compact('item'));
    }
}
