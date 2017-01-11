<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itens extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'user_id',
        'title',
        'description',
        'goodto',
        'type',
        'weight',
        'quantity',
        'photo'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function product(){
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

}
