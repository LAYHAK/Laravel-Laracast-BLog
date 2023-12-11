<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->word(3, true),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p class="h-24">'.implode('</p><p>', $this->faker->paragraphs(1)).'</p>',
            'body' => '<p>'.implode('</p><p>', $this->faker->paragraphs(6)).'</p>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'published_at' => Carbon::now(),
        ];
    }
}
