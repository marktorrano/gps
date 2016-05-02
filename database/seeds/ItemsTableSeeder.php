<?php

use App\Models\Item;
use App\Models\Photo;

class ItemsTableSeeder extends DatabaseSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = $this->getFaker();

        DB::table('items')->delete();
        DB::table('photos')->delete();

        for ($i = 0; $i < 20; $i++)
        {
            $name = $faker->word;
            $price = $faker->numberBetween($min = 20, $max = 100);
            $product_id = $faker->numberBetween($min = 1, $max = 5);

            Item::create([
                "name"       => $name,
                "price"      => $price,
                "product_id" => $product_id
            ]);
        }


    }
}
