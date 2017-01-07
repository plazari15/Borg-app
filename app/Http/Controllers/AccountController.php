<?php

namespace borg\Http\Controllers;

use borg\Account;
use borg\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * MyAccount view
     */
    public function index(){
        $account = Account::where('user_id', Auth::user()->id)->with('user')->first();
        $user = Auth::user();
        if(!empty($account)){
            return view('account.index', compact('account', 'user'));
        }

        return view('account.create', compact('account', 'user'));

    }

    public function saveData(AccountRequest $request)
    {
        try{
            if($request->hasFile('logomarca')) {
                $logo = $request->logomarca->store('logomarca', 'uploads');
                $request->merge(['logo' => $logo]);
            }

            if($request->hasFile('certificado')) {
                $certificado = $request->certificado->store('certificate', 'uploads');
                $request->merge(['certificate' => $certificado]);
            }

            $account = Account::firstOrCreate(['user_id' => Auth::user()->id]);

            if($account) {
                Auth::user()->account()->update($request->except(['_token', 'name', 'email', 'logomarca', 'certificado']));
            }else{
                Auth::user()->account()->create($request->all());
            }

            Session::flash('success', 'Dados Atualizados com Sucesso.');
        }catch(Exception $e){
            Session::flash('error', 'Ocorreu um erro, tente novamente.');
        }

        return back();
    }
}
