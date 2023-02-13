<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dogfood extends Model
{
    use HasFactory;
    protected $table="dogfoods";//追加DogFoodでないと認識しないと思われるからdogfoodsテーブルを認識させる。
}
