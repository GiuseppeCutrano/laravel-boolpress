<?php

use Illuminate\Database\Seeder;
use App\PostInformationModel;

class PostInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostInformationModel::class,100)->create()->each(function($id) {
            $id->save();
        });
    }
}
