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
        'daycalorie'
         
        
      ];
      
      
      

    
    //dogbreedテーブルとのリレーション（従側）
    public function breedget(){
        return $this->belongsTo('App\Models\DogBreed');
    }
      
      
      
      
      
}
