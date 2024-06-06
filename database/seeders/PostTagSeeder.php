<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $tags = Tag::all();

        /**
         * @var Post $post
         */
        foreach ($posts as $post) {
            $randomFiveTags = $tags->random(5)->pluck('id')->toArray();
            $post->tags()->attach($randomFiveTags);
        }
    }
}
