<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //        $user = User::factory()->create([
        //            'username' => 'Mich',
        //            'name' => 'Mich',
        //        ],
        //        );
        $category = Category::factory()->create([
            'name' => 'Family',
            'slug' => 'Family',
        ]);

        Post::factory(5)->create([
            'user_id' => 1,
            'category_id' => $category->id,
        ],
        );
    }
}
