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
    
    //1日の必要カロリーを算出
     public function getCalorieAttribute()
    {
        return (round(pow(pow(pow($this->weight,3),0.5),0.5)*70))*$this->life_stage->coefficient;
    }
    
    
    
    //この犬が１日に必要なたんぱく質量
     public function getRequiredProteinAttribute()
    {
        return ($this->calorie)/1000*45;
    }
    
    
    
    //この犬が１日に必要なビタミン量
     public function getRequiredVitaminAttribute()
    {
        return ($this->calorie)/1000*45;
    }
    
    
    //この犬が１日に必要な炭水化物量
     public function getRequiredCarbohydrateAttribute()
    {
        return ($this->calorie)/1000*45;
    }
    
    
     //この犬が１日に必要な脂質量
     public function getRequiredFatAttribute()
    {
        return ($this->calorie)/1000*45;
    }
            
    
    
    
    
    
    
    
    
     public function test(){
        return [1,2,3];
    }
      
      
      
      
      
}
