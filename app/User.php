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
        'presentation',
 
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

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'owner_id');
    }

    public function bids()
    {
        return $this->hasManyThrough(Bids::class, Advertisement::class, 'owner_id', 'advertisement_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments()
    {
        return $this->comments()->get();
    }

    public function getBids()
    {
        return $this->advertisement()->bids()->get();
    }

    public function getAdvertisements()
    {
        return $this->advertisement()->where('blocked', 0)->get();
    }
    
}
