<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        user::factory()->create([
   "name"=> "cikaltest",
   "email" => "test@example.com",

        ]);

    
        // User::factory(10)->create();
       $categories = [
        "tecnology",
        "sport",
        "entertaiment",
        "politic",
        "Demon",
       ];

       foreach ($categories as $category) {
        Category::create(['name' => $category,]);
    }
    
    Post::factory(100)->create();
}
}
