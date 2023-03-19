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
        
        
    public function proteinAmount($intake)
    {
        return $this->protein * ($intake/100);
    }
    
    public function fatAmount($intake)
    {
        return $this->fat * ($intake/100);
    }
    
    public function vitaminAmount($intake)
    {
        return $this->vitamin * ($intake/100);
    }
    
    public function carbohydrateAmount($intake)
    {
        return $this->carbohydrate * ($intake/100);
    }
    
    
    

    public function getGraphData($intake)
    {
        $data = [
            $this->proteinAmount($intake),
            $this->fatAmount($intake),
            $this->vitaminAmount($intake),
            $this->carbohydrateAmount($intake),
        ];
        
        return $data;
    }
    
  
  
 

  
    
    
}