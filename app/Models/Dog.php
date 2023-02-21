<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'name',
        'breed',
        'weight',
        'gender',
        'fix',
        'age',
        'food',
        'daykcl'
         
        
      ];
      
      
      
       
    //dogfoodテーブルとのリレーション（従側）
    public function getdogfood(){
        return $this->belongsTo('App\Models\Dogfood');
    }
    
    //dogbreedテーブルとのリレーション（従側）
    public function breed(){
        return $this->belongsTo('App\Models\DogBreed');
    }
      
      
      
      
      
}
