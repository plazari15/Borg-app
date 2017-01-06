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
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
