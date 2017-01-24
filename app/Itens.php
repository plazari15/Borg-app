<?php

namespace borg;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class Itens extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'code',
        'category_id',
        'measure',
        'min_price',
        'max_price',
        'user_id',
        'title',
        'description',
        'goodto',
        'type',
        'weight',
        'quantity',
        'photo',
        'status',
        'price',
        'available_date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->hasOne(Products::class, 'id', 'product_id');
    }


    public function category(){
        return $this->hasOne(ProductsCategory::class, 'id', 'category_id');
    }

    public function getPhotoAttribute($value){
        return URL::asset('uploads/'.$value);
    }

    public function getAvailableDateAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setAvailableDateAttribute($value)
    {
        if(!empty($value)){
            $value = Carbon::createFromFormat('d/m/Y', $value)->format('y-m-d');
        }
        return $value;
    }

}
