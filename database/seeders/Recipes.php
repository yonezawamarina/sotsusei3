<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Recipes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
           [
                 'image' => 'flower.jpg',
                 'name' => 'はくさいごはん',
                 'kilocalorie' => '20',
                 'protein' => '10',
                 'carbohydrate' =>'20',
                 'vitamin' => '20',
                 'fat' => '30',
                 'material' => 'はくさい10ｇ、水100cc、しょうが3ｇ',
                 'process' => '1.野菜をきる　2. 野菜をゆでる　3.野菜をやく',
                 'co' => '食いつきが悪いわんちゃんにお勧めです'
                 
           ],
           [
                 'image' => 'flower.jpg',
                 'name' => 'にんじんごはん',
                 'kilocalorie' => '10',
                 'protein' => '20',
                 'carbohydrate' =>'30',
                 'vitamin' => '10',
                 'fat' => '20',
                 'material' => 'にんじん10ｇ、水100cc、しょうが3ｇ',
                 'process' => '1.野菜をきる　2. 野菜をゆでる　3.野菜をやく',
                 'co' => 'ビタミンの摂取ができます'
           ]
    
        ]);
    }
}
