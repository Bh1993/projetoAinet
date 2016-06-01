<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class); // TODO: Corrigir return
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
     
}
