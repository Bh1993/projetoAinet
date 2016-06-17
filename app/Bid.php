<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'price_cents', 'trade_prefs', 'quantity', 'trade_location', 'comment',  // TODO: ALTERAR
        'advertisement_id','status','buyer_eval','seller_eval',
 
    ]; 

    protected $hidden = [
        'id',
    ];


   public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }

    public function getName()
    {
        return $this->user->name;
    }

    public function getStatus()
    {
        if($this->status == 1){
            return('Pending');
        }
        elseif($this->status == 2){
            return('Refused');
        }
        elseif($this->status == 3){
            return('Accepted');
        }
        else{
            return('Canceled');
        }
        
    }
}
