<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
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
