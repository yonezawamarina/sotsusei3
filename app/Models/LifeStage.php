<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeStage extends Model
{
    use HasFactory;
    
    
     protected $fillable = [
        'name',
        'coeffficient'
        
      ];
      
      //Dogテーブルとのリレーション（主テーブル側） 
     public function getlifestagedogs(){
        return $this->hasMany('App\Models\Dog');
    }
      
      
      
      
}
