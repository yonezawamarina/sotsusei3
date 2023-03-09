<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    
    //レシピテーブルとの多対多リレーション
    public function recipes(){
        return $this->belongsToMany('App\Models\Recipe');
    } 
}
