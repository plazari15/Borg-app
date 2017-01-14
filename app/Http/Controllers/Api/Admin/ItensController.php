<?php

namespace borg\Http\Controllers\Api\Admin;

use borg\Itens;
use borg\Notifications\YourItenHasBeenDeleted;
use Carbon\Carbon;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use League\Flysystem\Exception;

class ItensController extends Controller
{
    public function index(){
        return Itens::with(['user', 'product'])->get();
    }

    public function delete($id){
        try{
            $itens = Itens::find($id);

            $itens->user->notify( (new YourItenHasBeenDeleted($itens))->delay( Carbon::now()->addMinutes(2) ));

            $itens->delete($id);
        }catch (Exception $E){
            dd('erro');
        }
        return response()->json(['code' => 200, 'message' => 'O item foi deletado e uma notificação enviada ao usuário.']);
    }
}
