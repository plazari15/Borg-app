<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

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
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

    public function getPhotoAttribute($value){
        return URL::asset('uploads/'.$value);
    }

}
