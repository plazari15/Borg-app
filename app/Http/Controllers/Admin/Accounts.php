<?php

namespace borg\Http\Controllers\Admin;

use borg\Account;
use borg\Http\Requests\Admin\AccountRequest;
use borg\User;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class Accounts extends Controller
{
    public function lists($status){
        return view('admin.account.index', compact('status'));
    }

    public function waiting(){
        return view('admin.account.index');
    }

    public function denided(){
        return view('admin.account.index');
    }

    public function edit($id){
        $account = Account::find($id);
        return view('admin.account.edit', compact('account'));
    }

    public function update($id, AccountRequest $request){
        try{
            $account = Account::find($id);
            $account->update($request->all());
            $user = $account->user()->update($request->only(['name', 'email']));
            \Event::fire('user.change', array(User::find($account->user_id)));
            Session::flash('success', 'Dados atualizados com sucesso');
        }catch(Exception $e){
            Session::flash('error', 'Tivemos problemas ao atualizar os dados, tente novamente!');
        }
        return back();
    }
}
