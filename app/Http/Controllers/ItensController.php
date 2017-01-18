<?php

namespace borg\Http\Controllers;

use borg\Http\Requests\Dashboard\Item;
use borg\Itens;
use borg\Products;
use borg\ProductsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class ItensController extends Controller
{
    public function index(){
        return view('itens.index');
    }

    public function create(){
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

        return view('itens.create', compact('cat','products'));
    }

    public function store(Item $request){
        try{
            if($request->hasFile('foto')){
                $foto = $request->foto->store('itens', 'uploads');
                $request->merge(['photo' => $foto]);
            }

            Auth::user()->itens()->create($request->all());

            Session::flash('flash_message', 'Cadastro realizado com sucesso');
        }catch (Exception $e){
            Session::flash('flash_message', 'Erro ao cadastrar');
        }
        return redirect('dashboard/itens');
    }

    public function edit($id){
        $item = Auth::user()->itens()->where('id', $id)->first();
        $categories = ProductsCategory::all();
        $cat = [];
        $cat[''] = 'Selecione';
        foreach ($categories as $category){
            $cat[$category->id] = $category->title;
        }

        $prods = Products::all();
        $products = [];
        $products[''] = 'Selecione';
        foreach ($prods as $product){
            $products[$product->id] = $product->title;
        }

        if($item){
            return view('itens.edit', compact('item', 'products', 'cat'));
        }

        Session::flash('flash_message', 'Erro ao localizar o item');
        return back();
    }


    public function update($id, Item $request){
        try{
            if($request->hasFile('foto')){
                $foto = $request->foto->store('itens', 'uploads');
                $request->merge(['photo' => $foto]);
            }

            Auth::user()->itens()->where('id', $id)->update($request->except(['_token', 'foto']));

            Session::flash('flash_message', 'Cadastro realizado com sucesso');
        }catch (Exception $e){
            Session::flash('flash_message', 'Erro ao cadastrar');
        }
        return redirect('dashboard/itens');
    }
}
