<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Categories::class,
            Dogbreeds::class,
            DogfoodSeeder::class,
            Lifestages::class,
            Recipes::class,
            CategoryrecipeSeeder::class
              
            ]);
        
        
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Yamada Taro',
            'email' => 'yamada@example.com',
            'password' => bcrypt('himitudayo'),
        ]);
    }
}
