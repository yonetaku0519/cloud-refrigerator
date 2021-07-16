<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storing extends Model
{
    use SoftDeletes;
    // Foodsテーブルとの関係
    public function foods() {
        
        return $this->hasMany(Food::class);
        
    }
}
