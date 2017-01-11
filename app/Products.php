<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'title',
        'measure',
        'photo'
    ];

    public function getPhotoAttribute($value){
        return url('uploads/'.$value);
    }

    public function itens(){
        return $this->hasMany(Itens::class);
    }
}
