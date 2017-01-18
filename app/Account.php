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

    protected $appends = [
        'accountstatus'
    ];

    protected $casts = [
        'area' => 'array'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


    /**
     * Exibir campos
     */
    public function getaccountstatusAttribute(){
        switch ($this->status){
            case '0':
                $response = ["class" => "label-warning", "label" => "Inativo"];
                break;

            case '1':
                $response = ['class' => 'label-success', 'label' => 'Ativo'];
                break;

            case '2':
                $response = ["class" => "label-danger", "label" => "Reprovado"];
                break;
        }

        return $response;
    }

}
