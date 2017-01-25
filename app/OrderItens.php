<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;

class OrderItens extends Model
{
    protected $fillable = [
        'order_id',
        'itens_id',
        'quantity',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function item()
    {
        return $this->belongsTo(Itens::class);
    }
}
