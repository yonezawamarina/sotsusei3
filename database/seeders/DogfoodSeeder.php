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
         DB::table('dogfoods')->insert([
           [
                 'dogfoodname' => 'フード1',
                 'tanpakushitsu' => '10',
                 'vitamin' => '20',
                 'shishitsu' => '30'
                 
           ],  
           [
                  'dogfoodname' => 'フード2',
                  'tanpakushitsu' => '1',
                  'vitamin' => '2',
                  'shishitsu' => '3'
           ]
             
        ]);
    }
}
