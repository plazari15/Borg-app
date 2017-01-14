<?php

namespace borg;

use Illuminate\Database\Eloquent\Model;

class OrderItens extends Model
{
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
