<?php

namespace borg\Http\Controllers\Admin;

use borg\Itens;
use borg\Products;
use borg\ProductsCategory;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;

class ItensController extends Controller
{
    public function index(){
        return view('admin.itens.index');
    }

    public function view($id){
        $item = Itens::find($id);

        $categories = ProductsCategory::all();
        $cat = [];
        foreach ($categories as $category){
            $cat[$category->id] = $category->title;
        }

        $prods = Products::all();
        $products = [];
        foreach ($prods as $product){
            $products[$product->id] = $product->title;
        }


        return view('admin.itens.view', compact('item', 'products', 'cat'));
    }
}
