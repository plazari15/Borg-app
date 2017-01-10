<?php

namespace borg\Http\Controllers\Admin;

use borg\Http\Controllers\Controller;
use borg\Http\Requests\Admin\ProductsRequest;
use borg\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class AdminProdutos extends Controller
{
    public function index(){
        return view('admin.products.index');
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(ProductsRequest $request){
        try{
            if($request->file('foto')){
                $link = $request->foto->store('products', 'uploads');
                $request->merge(['photo' => $link]);
            }
            Products::create($request->all());
            Session::flash('success', 'Dados Atualizados com Sucesso.');
        }catch (Exception $e){
            Session::flash('error', 'Infelizmente, tivemos um problema para cadastrar');
        }
        return redirect('dashboard/admin/produtos');
    }

    public function edit($id){
        $product = Products::find($id);
        return view('admin.products.update', compact('product'));
    }

    public function update($id, ProductsRequest $request){
        try{
            if($request->file('foto')){
                $link = $request->foto->store('products', 'uploads');
                $request->merge(['photo' => $link]);
            }
            Products::find($id)->update($request->all());
            Session::flash('success', 'Dados Atualizados com Sucesso.');
        }catch (Exception $e){
            Session::flash('error', 'Infelizmente, tivemos um problema para cadastrar');
        }
        return redirect('dashboard/admin/produtos');
    }
}
