<?php

use Illuminate\Database\Seeder;
use App\PostModel;
use App\TagsModel;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = TagsModel::all();
        $posts = PostModel::all();
        
        foreach($posts as $post){

        for($i = 1; $i <= $faker->numberBetween(1,$tags->count()); $i++){
            DB::table("post_tag")->insert([
                "post_id" => $post->id,
                "tag_id" => $i
                

            ]);
        }

        }

        
    }
}

