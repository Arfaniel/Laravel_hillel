<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::factory(100)->create();
        $posts = Post::factory(100)->make()->each(function ($post) use ($categories, $users, $tags){
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->tag_id = $tags->random()->id;
            $post->save();
        });

        $tags->each(function ($tag) use ($posts){
            $tag->posts()->attach($posts->random(rand(5, 10))->pluck('id'));
        });
    }
}
