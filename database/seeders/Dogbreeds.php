<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Dogbreeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
         DB::table('dog_breeds')->insert([
           [
                
                 'name' => '柴犬',
               
           ],  
           [
                 'name' => 'チワワ',
                 
           ]
             
        ]);
    }
}
