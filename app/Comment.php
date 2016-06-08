<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'comment', 'user_id', 'advertisement_id',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'parent_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    } 
     
}
