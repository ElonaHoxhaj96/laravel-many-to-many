<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 300; $i++){
            $post = Post::inRandomOrder()->first();
           
            //estraggo l'id di un tag random
            $tag_id = Tag::inRandomOrder()->first()->id;
            
            //aggiungo la relazione tra il post estratto e l'id estratto
            $post->tags()->attach($tag_id);

        }
    }
}
