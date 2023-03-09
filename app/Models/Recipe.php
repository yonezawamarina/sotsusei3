<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    //カテゴリーテーブルとの多対多リレーション
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    } 
    
    
}
