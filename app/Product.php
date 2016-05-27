<?php

namespace App;

class Product 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'name', 'description', 'available_on', 'available_until', 'price_cents', 
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
