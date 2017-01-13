<?php

namespace borg\Http\Controllers;

use borg\Http\Requests\Dashboard\Item;
use borg\Itens;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class ItensController extends Controller
{
    public function index(){
        return view('itens.index');
    }

    public function create(){
        return view('itens.create');
    }

    public function store(Item $request){
        try{
            if($request->hasFile('foto')){
                $foto = $request->foto->store('itens', 'uploads');
                $request->merge(['photo' => $foto]);
            }

            Itens::create($request->all());

            Session::flash('flash_message', 'Cadastro realizado com sucesso');
        }catch (Exception $e){

        }

    }
}
