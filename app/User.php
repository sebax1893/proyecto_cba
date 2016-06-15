<?php

namespace CBA;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'id_users';

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

    public $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email, {{$id}}',
        // 'password' => 'required|min:6|confirmed',
        'is_admin' => 'required|in:0,1',
    ];

}
