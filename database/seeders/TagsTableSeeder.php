<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Front End', 'Back End', 'Design', 'UX', 'Laravel', 'VueJS', 'Angular', 'React'];

        foreach( $data as $tag ){
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Helper::generateSlug($new_tag->name, Tag::class);
            $new_tag->save();
        }

    }
}
