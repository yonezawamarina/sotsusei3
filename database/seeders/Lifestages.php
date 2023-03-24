<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Lifestages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('life_stages')->insert([
           [
                 'name' => '生後４ヶ月までの幼犬',
                 'coefficient' =>  '1'
               
           ],  
           [
                 'name' => '生後4ヶ月から１年までの幼犬',
                 'coefficient' =>  '2'
           ],
           [
                 'name' => '避妊・去勢済みの成犬',
                 'coefficient' =>  '3'
           ],
           [
                 'name' => '避妊・去勢なしの成犬',
                 'coefficient' =>  '4'
           ],
           [
                 'name' => '7歳以上で避妊・去勢済みの中高齢犬',
                 'coefficient' =>  '5'
           ],
           [
                 'name' => '7歳以上で避妊・去勢なしの中高齢犬',
                 'coefficient' =>  '6'
           ],
           [
                 'name' => '肥満傾向の成犬',
                 'coefficient' =>  '7'
           ]
          
        ]);
    }
}
