<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    
    
   //recipeテーブルとのリレーション（従側）
    public function recipe(){
        return $this->belongsTo('App\Models\Recipe');
    }
}
