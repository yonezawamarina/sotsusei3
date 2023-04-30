<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    
    //Materialテーブルとのリレーション（主テーブル側） 
     public function materials(){
        return $this->hasMany('App\Models\Material');
    }
    
    //カテゴリーテーブルとの多対多リレーション
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    } 
    
    
  
   
}
