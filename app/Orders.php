<?php

namespace borg;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItens()
    {
        return $this->hasMany(OrderItens::class, 'order_id', 'id');
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 'aguardando':
                $value = ['label' => 'label-warning', 'body' => 'Aguardando', 'code' => $value];
                break;

            case 'processando':
                $value = ['label' => 'label-info', 'body' => 'Processando', 'code' => $value];
                break;

            case 'realizando pedidos':
                $value = ['label' => 'label-info', 'body' => 'Realizando Pedidos', 'code' => $value];
                break;

            case 'aguardando recebimento':
                $value = ['label' => 'label-primary', 'body' => 'Aguardando recebimento', 'code' => $value];
                break;

            case 'recebido':
                $value = ['label' => 'label-info', 'body' => 'Recebido', 'code' => $value];
                break;

            case 'preparando envio':
                $value = ['label' => 'label-warning', 'body' => 'Preparando envio', 'code' => $value];
                break;

            case 'enviado':
                $value = ['label' => 'label-success', 'body' => 'Enviado', 'code' => $value];
                break;
        }

        return $value;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y -  H:i:s');
    }
}
