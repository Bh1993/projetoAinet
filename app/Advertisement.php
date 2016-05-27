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

    

}


