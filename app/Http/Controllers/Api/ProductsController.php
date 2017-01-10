<?php

namespace borg\Http\Controllers\Api;

use borg\Products;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use League\Flysystem\Exception;

class ProductsController extends Controller
{
    public function index(){
        return Products::all();
    }

    public function delete($id){
        try{
            Products::destroy($id);
            return response()->json(['message' => 'Produto excluído com sucesso'], 200);
        }catch (Exception $e){
            return response()->json(['message' => 'Erro ao excluir o produto'], 502);
        }
    }
}
