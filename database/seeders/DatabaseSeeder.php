<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'username' => 'Layhak',
            'name' => 'Layhak',
            'email' => 'layhak@gmail.com',
            'password' => bcrypt('password'),
        ],
        );
        $category = Category::factory()->create([
            'name' => 'Work',
            'slug' => 'Work',
        ],
        );

        Post::factory(15)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ],
        );
    }
}
