<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
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
        $users =  \App\Models\User::factory(10)->create();
        $categories = \App\Models\Category::factory(25)->create();
        Post::factory(100)->make()->each(function ($post) use ($categories, $users){
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
