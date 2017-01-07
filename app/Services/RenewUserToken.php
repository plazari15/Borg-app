<?php
/**
 * Created by PhpStorm.
 * User: plazari
 * Date: 07/01/17
 * Time: 03:34
 */

namespace borg\Services;


use borg\User;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class RenewUserToken
{
    public function __construct($user)
    {
        try{
            $user = User::find($user);

            $user->api_token = $this->newToken();

            $user->save();
        }catch (Exception $e){
            Log::info('Erro ao enviar um novo token ao usuário');
        }

    }

    /**
     * Cria um novo token
     */
    protected function newToken()
    {
        return str_random(60);
    }
}