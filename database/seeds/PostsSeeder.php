<?php

use Illuminate\Database\Seeder;
use App\PostModel;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostModel::class,100)->create()->each(function($id){
            $id->save();
        });
    }
}