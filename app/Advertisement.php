<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'available_on', 'available_until', 'price_cents', 
        'quantity',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'owner_id', 
    ];

    public function getStatus()
    {
        return $this->blocked ? 'Blocked' : 'Unblocked';
    }

<<<<<<< HEAD
   
=======
    public function comments()
    {
        return $this->hasMany('App\Comment'); // Segundo a documentação
    }
>>>>>>> ffb7e22e56116429fe7d2c971622eba02da5ae6f

}


