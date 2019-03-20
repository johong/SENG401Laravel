<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iSBN', 'name', 'year', 'publisher', 'image', 'subscription',
    ];

    
    public function authors(){
        return $this->belongsToMany(Authors::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribe(){
        return $this->hasMany(Subscribe::class);
    }
}
