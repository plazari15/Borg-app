<?php

namespace borg\Http\Controllers\Api;

use borg\Account;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;

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
}
