<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    //カテゴリーテーブルとの多対多リレーション
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    } 
    
    
    
    
    //
     public function getRecipeProteinAttribute(){
        return ($this->vitamin*10);
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
