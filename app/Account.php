<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'cnpj',
        'social',
        'website',
        'occupation',
        'cep',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'country',
        'logo',
        'certificate',
        'phone'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


    /**
     * Exibir campos
     */
    public function status(){
        switch ($this->status){
            case '0':
                return ['class' => 'label-warning', 'label' => 'Inativo'];
                break;

            case '1':
                return ['class' => 'label-success', 'label' => 'Ativo'];
                break;

            case '2':
                return ['class' => 'label-danger', 'label' => 'Reprovado'];
                break;
        }
    }

}
