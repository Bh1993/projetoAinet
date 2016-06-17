<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 
    ];

    protected $hidden = [
        'id', 
    ]; 

    public function advertisement()
    {
        return $this->belongsToMany(Advertisement::class);
    }

}
