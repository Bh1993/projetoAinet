<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
     protected $fillable = [
        'advertisement_id', 'media_url', 'photo_path', 

    ];

    protected $hidden = [
        'id', 
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }
}
