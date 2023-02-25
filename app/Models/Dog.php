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
    public function dog_breed(){
        return $this->belongsTo('App\Models\DogBreed');
    }
    
    
    //lifestageテーブルとのリレーション（従側）
     public function life_stage(){
        return $this->belongsTo('App\Models\LifeStage');
    }
    
    
     public function getCalorieAttribute()
    {
        return (round(pow(pow(pow($this->weight,3),0.5),0.5)*70))*$this->life_stage->coefficient;
    }
    
     public function getRequiredProteinAttribute()
    {
        return ($this->calorie)/1000*;
    }
            
    
    
    
    
    
    
    
    
     public function test(){
        return [1,2,3];
    }
      
      
      
      
      
}
