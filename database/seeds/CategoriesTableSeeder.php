<?php

use App\Models\Category;

class CategoriesTableSeeder extends DatabaseSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('categories')->delete();

        Category::create([
            "name" => 'Men',
        ]);

        Category::create([
            "name" => 'Women',
        ]);

        Category::create([
            "name" => 'Kids',
        ]);

    }
}
