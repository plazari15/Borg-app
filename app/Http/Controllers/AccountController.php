<?php

namespace borg\Http\Controllers;

use borg\Account;
use borg\Http\Requests\AccountRequest;
use borg\Http\Requests\PasswordRequest;
use borg\Services\RenewUserToken;
use DebugBar\DebugBar;
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
        $user = Auth::user();
        if(!empty($user->account)){
            return view('account.index', compact('user'));
        }

        return view('account.create', compact('user'));

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

            $request->merge(['area' => json_encode($request->area)]);

            $account = Account::firstOrCreate(['user_id' => Auth::user()->id]);

            if($account) {
                Auth::user()->update($request->only('email', 'name'));
                Auth::user()->account()->update($request->except(['_token', 'name', 'email', 'logomarca', 'certificado']));
                \Event::fire('user.change', array(Auth::user()));
            }else{
                Auth::user()->update($request->only('email', 'name'));
                Auth::user()->account()->create($request->all());
                \Event::fire('user.change', array(Auth::user()));
            }

            Session::flash('success', 'Dados Atualizados com Sucesso.');
        }catch(Exception $e){
            Debugbar::addException($e);
            Session::flash('error', 'Ocorreu um erro, tente novamente.');
        }

        return back();
    }

    public function passEdit(){
        return view('account/password');
    }

    public function passUpdate(PasswordRequest $request){
        try{
           $user = Auth::user();
           $user->password = bcrypt($request->pass);
           $user->save();
           \Event::fire('user.change', array($user));
            Session::flash('success', 'Dados Atualizados com Sucesso.');
        }catch (Exception $e){
            Session::flash('error', 'Ocorreu um erro, tente novamente.');
        }
        return back();
    }
}
