<?php

use Illuminate\Database\Seeder;
use App\CategoriesModel;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoriesModel::class,5)->create()->each(function($id){
            $id->save();
        });
    }
}
