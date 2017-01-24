<?php

namespace borg\Http\Controllers;

use borg\Http\Requests\Dashboard\Item;
use borg\Itens;
use borg\Notifications\NewItenCreated;
use borg\Products;
use borg\ProductsCategory;
use borg\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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

        return view('itens.create', compact('cat','products'));
    }

    public function store(Item $request){
        try{
            if($request->hasFile('foto')){
                $foto = $request->foto->store('itens', 'uploads');
                $request->merge(['photo' => $foto]);
            }

            if(!$request->has('product_id')){
                $request->merge(['product_id' => null]);
            }

            if(!$request->has('category_id')){
                $request->merge(['category_id' => null]);
            }

            if(!$request->has('weight')){
                $request->merge(['weight' => null]);
            }

            if(!$request->has('quantity')){
                $request->merge(['quantity' => null]);
            }

            if(!$request->has('available_date')){
                $request->merge(['available_date' => null]);
            }
            if($request->hasFile('foto')){
                $foto = $request->foto->store('itens', 'uploads');
                $request->merge(['photo' => $foto]);
            }

            $itens = Auth::user()->itens()->create($request->all());
            Notification::send(User::find(1), new NewItenCreated($itens));
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

            if(!$request->has('product_id')){
                $request->merge(['product_id' => null]);
            }

            if(!$request->has('category_id')){
                $request->merge(['category_id' => null]);
            }

            if(!$request->has('weight')){
                $request->merge(['weight' => null]);
            }

            if(!$request->has('quantity')){
                $request->merge(['quantity' => null]);
            }

            if(!$request->has('available_date')){
                $request->merge(['available_date' => null]);
            }

            Auth::user()->itens()->where('id', $id)->update($request->except(['_token', 'foto']));

            Session::flash('flash_message', 'Cadastro realizado com sucesso');
        }catch (Exception $e){
            Session::flash('flash_message', 'Erro ao cadastrar');
        }
        return redirect('dashboard/itens');
    }
}
