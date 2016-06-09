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
        'quantity', 'trade_prefs',

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

    public function media()
    {
        return $this->hasMany(Media::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class); 
    }

    // As an authenticated user I want to be able to bid on a product that I do not own;
    public function bids() 
    {
        return $this->hasMany(Bid::class , 'advertisement_id'); 
    }

}


