<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogFood extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'calorie',
        'protein',
        'carbohydrate',
        'vitamin',
        'fat'
        
      ];
      
      public function getCalorieAttribute()
        {
            $calories = $this->protein * 4 + $this->carbohydrate * 4 + $this->fat * 9;
            return $calories;
        }
            
        
    
    
}
