<?php

namespace App;

use Illuminate\Foundation\Auth\Product as Authenticatable;

class Product extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'name', 'description', 'available_on', 'available_until', 'price_cents', 
        'trade_prefs', 'quantity', 'blocked', 'sells_evals', 'sells_count', 'buys_evals', 'buys_count',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'owner_id', 
    ];

    

}
