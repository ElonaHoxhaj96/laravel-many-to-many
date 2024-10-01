<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Functions\Helper;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ( $i = 0; $i < 200; $i++)
        {
            $new_post = new Post();
            $new_post->category_id = Category::inRandomOrder()->first()->id;
            $new_post->title = $faker->sentence();
            $new_post-> slug = Helper::generateSlug($new_post->title, Post::class);
            $new_post-> txt = $faker->paragraph();
            $new_post-> reading_time = $faker-> numberBetween(1, 10);
            $new_post->save();
        }        
    }
}
