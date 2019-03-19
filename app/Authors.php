<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    public function book(){
        return $this->belongsToMany(Book::class);
    }
}
