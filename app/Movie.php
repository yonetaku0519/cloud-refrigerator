<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
   // Userモデルとの関係
    public function user() {
        
        return $this->belongTo(User::class);
        
    }
}
