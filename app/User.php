<?php

namespace CBA;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];
    
    // public function isAdmin()
    // {
    //     return $this->is_admin;
    // }

    public function setPasswordAttribute($valor){
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    
}
