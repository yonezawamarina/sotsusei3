<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DogfoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('dog_food')->insert([
           [
                 'image' => 'flower.jpg',
                 'name' => 'フード1',
                 'kilocalorie' => '20',
                 'protein' => '10',
                 'carbohydrate' =>'20',
                 'vitamin' => '20',
                 'fat' => '30'
                 
           ],  
           [
                 'image' => 'flower.jpg',
                 'name' => 'フード2',
                 'kilocalorie' => '30',
                 'protein' => '40',
                 'carbohydrate' =>'50',
                 'vitamin' => '60',
                 'fat' => '10'
           ]
             
        ]);
    }
}
