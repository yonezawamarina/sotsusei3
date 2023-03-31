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
    
    
    
    
    //ここから栄養素計算
     public function getRecipeProteinAttribute(){
        return ($this->vitamin*10);
    }
    
    
    
    public function getproteinAmount()
    {
        return $this->protein;
    }
    
    public function getfatAmount()
    {
        return $this->fat;
    }
    
    public function getvitaminAmount()
    {
        return $this->vitamin;
    }
    
    public function getcarbohydrateAmount()
    {
        return $this->carbohydrate;
    }
    
    
    
    
    
    
    
     public function getRecipeGraphData()
    {
        $data = [
            $this->proteinAmount,
            $this->fatAmount,
            $this->vitaminAmount,
            $this->carbohydrateAmount,
        ];
        
        return $data;
    }
    
    
}
