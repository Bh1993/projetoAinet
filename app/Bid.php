<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    /* protected $fillable = [
        'name', 'description', 'available_on', 'available_until', 'price_cents',  // TODO: ALTERAR
        'quantity',

    ]; */


   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
