<?php

namespace borg;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Relation With Account
     */
    public function account(){
        return $this->hasOne(Account::class);
    }

    public function itens(){
        return $this->hasMany(Itens::class);
    }
    
    
    /**
     * Exibição dos campos
     */
    
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
