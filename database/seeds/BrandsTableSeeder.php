<?php

use App\Models\Brand;

class BrandsTableSeeder extends DatabaseSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('brands')->delete();
        DB::table('collections')->delete();

        Brand::create([
            "name" => 'Nike',
        ]);

        Brand::create([
            "name" => 'Adidas',
        ]);

        Brand::create([
            "name" => 'Snoopy',
        ]);
        Brand::create([
            "name" => 'Lacoste',
        ]);

        Brand::create([
            "name" => 'Jeans West',
        ]);

        for ($i = 1; $i < 6; $i++)
        {
            for ($ii = 1; $ii < 4; $ii++)
            {

                DB::table('collections')->insert([
                    'category_id' => $ii,
                    'brand_id'    => $i
                ]);
            }

        }

    }

}
