<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        $slug = Str::slug($title);
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'slug' => $slug,
            'title' => $title,
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
            'body' => $this->faker->text(),
            'published_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
