<?php

namespace borg\Http\Controllers;

use borg\Account;
use borg\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return view('account.index', compact('account', 'user'));
    }

    public function saveData(AccountRequest $request){
        DB::beginTransaction();
        try{
            if($request->hasFile('logomarca')){
                $logo = $request->logomarca->store('logomarca');
                $request->merge(['logo' => $logo]);
            }

            if($request->hasFile('certificado')){
                $certificado = $request->certificado->store('certificate');
                $request->merge(['certificate' => $certificado]);
            }
            
            Auth::user()->account()->create($request->all());
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return back();
        }
    }
}
