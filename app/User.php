<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'location', 'profile_photo', 'profile_url', 
        'presentation', 'admin', 'blocked', 'sells_evals', 'sells_count', 'buys_evals', 'buys_count',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getType()
    {
        return $this->admin ? 'Admin' : 'Client';
    }

    public function getStatus()
    {
        return $this->blocked ? 'Blocked' : 'Unblocked';
    }
    
}
