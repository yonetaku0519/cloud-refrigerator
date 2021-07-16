<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Food extends Model
{
    use SoftDeletes;
    
    // Userモデルとの関係
    public function user() {
        
        return $this->belongTo(User::class);
        
    }
    
        // Stroingモデルとの関係
    public function storing() {
        
        return $this->belongTo(Storing::class);
        
    }
    
}
