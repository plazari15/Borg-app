<?php

namespace borg\Http\Controllers\Api;

use borg\Account;
use borg\User;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use League\Flysystem\Exception;

class AccountsController extends Controller
{
    /**
     * Lista todos os usuários na api
     * @param $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function list($action){
        switch ($action){
            case 'all':
                $account = Account::with('user')->get();
                break;

            case 'waiting':
                $account = Account::where('status', 0)->with('user')->get();
                break;

            case 'removed':
                $account = Account::where('status', 2)->with('user')->get();
                break;
        }

        return response()->json($account);
    }

    public function status($id, Request $request){
        try{
            $account = Account::find($id);
            $account->status = $request->code;
            $account->save();
            $response = ['code' => 200, 'message' => 'Dados atualizados com sucesso'];
        }catch (Exception $e){
            $response = ['code' => 500, 'message' => 'Tivemos um problema ao atualizar'];
        }
        return response()->json($response);
    }

    public function delete($id){
        try{
            $account = Account::find($id);
            $user = User::destroy($account->user_id);
            Account::destroy($id);
            $response = ['code' => 200, 'message' => 'Conta removida com sucesso'];
        }catch (Exception $e){
            $response = ['code' => 500, 'message' => 'Tivemos um problema ao atualizar'];
        }
        return response()->json($response);
    }
}
