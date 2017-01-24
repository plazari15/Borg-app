<?php

namespace borg\Http\Controllers\Api\Admin;

use borg\Account;
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

    public function getItem($id)
    {
        $itens = Itens::find($id);
        $accounts = Account::where('user_id', $itens->user_id)->first();

        return response()->json([
            'id' => $itens->id,
            'fornecedor' => $accounts->social,
            'disponibilidade' => $itens->status,
            'data' => $itens->available_date,
            'price' => 'R$ ' . $itens->price,
            'weight' => 'até ' . ($itens->weight ?? $itens->quantity) . ' ' . $itens->measure,
            'max' => ($itens->weight ?? $itens->quantity)
        ]);
    }
}
