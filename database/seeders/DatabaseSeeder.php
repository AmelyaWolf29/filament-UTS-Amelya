<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Banner::factory(20)->create();
        \App\Models\CategoryBlog::factory(20)->create();
        
        User::where('email', 'test@example.com')->delete();
        User::create([
            'name' => 'Amelya',
            'email' => 'amelyachow@gmail.com',
            'password' => bcrypt('amelyapass'),
        ]);
    }
}
