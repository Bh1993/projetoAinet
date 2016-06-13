<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'price_cents', 'trade_prefs', 'quantity', 'trade_location', 'comment',  // TODO: ALTERAR
        'advertisement_id','buyer_id','status','buyer_eval','seller_eval',
 
    ]; 


   public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function advertisement()
    {
        return $this->hasOne(Advertisement::class);
    }
}
