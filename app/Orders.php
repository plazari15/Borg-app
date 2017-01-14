<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItens()
    {
        return $this->hasMany(OrderItens::class, 'order_id', 'id');
    }
}
