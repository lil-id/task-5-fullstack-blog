<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "lilo",
            "email" => "lilo@gmail.com",
            "password" => "123456",
            'remember_token' => Str::random(10),
        ]);

        User::factory(3)->create();

        Category::factory(3)->create();

        Post::factory(20)->create();
    }
}
