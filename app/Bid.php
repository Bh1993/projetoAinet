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
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function advertisement()
    {
        return $this->hasOne(Advertisement::class);
    }
}
