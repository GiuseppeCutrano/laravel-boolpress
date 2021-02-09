<?php

use Illuminate\Database\Seeder;
use App\TagsModel;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<100; $i++){

            $newTag = new TagsModel();

            $newTag->name = $faker->word;

            $newTag->save();
        }
    }
}
