<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryrecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_recipe')->insert([
           [
                
                 'category_id' => '1',
                 'recipe_id' => '2'
               
           ],  
           [
                 'category_id' => '2',
                 'recipe_id' => '1'
                 
           ]
             
        ]);
    }
}
