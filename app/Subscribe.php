<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
