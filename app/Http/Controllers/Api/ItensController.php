<?php

namespace borg\Http\Controllers\Api;

use borg\Itens;
use borg\User;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use League\Flysystem\Exception;

class ItensController extends Controller
{
    public function index(Request $request){
        return Itens::where('user_id', $request->user()->id)->with('product')->get();
    }

    public function delete($id, Request $request){
        try{
            $itens = Itens::where('id', $id)->where('user_id', $request->user()->id)->first();

            $itens->delete($itens->id);

            return response()->json(['message' => 'Item removido com sucesso!'], 200);
        }catch (Exception $e){
            dd($e);
        }

    }
}
