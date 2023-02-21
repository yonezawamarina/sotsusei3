<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogBreed extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'name'
        
      ];
      
     //Dogテーブルとのリレーション（主テーブル側） 
     public function getdogs(){
        return $this->hasMany('App\Models\Dog');
    }
      
      
    
}
