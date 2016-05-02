<?php

use App\Models\Product;
use App\Models\Photo;

class ProductsTableSeeder extends DatabaseSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = $this->getFaker();

        DB::table('products')->delete();
        DB::table('photos')->delete();

        Product::create([
            'name'          => 'Nike Dri-Fit',
            'description'   => 'Nike Dri-Fit',
            'collection_id' => '1',
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
        Photo::create([
            "path"           => "photo1.jpg",
            "imageable_id"   => '1',
            "imageable_type" => "App\Models\Product"
        ]);
        //
        Product::create([
            'name'          => 'Nike Tech Knit Pocket Tee',
            'description'   => 'Nike Tech Knit Pocket Tee',
            'collection_id' => '1',
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
        Photo::create([
            "path"           => "photo2.jpg",
            "imageable_id"   => '2',
            "imageable_type" => "App\Models\Product"
        ]);

        //
        Product::create([
            'name'          => 'Dri Fit Knit Tank',
            'description'   => 'Dri Fit Knit Tank',
            'collection_id' => '5',
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
        Photo::create([
            "path"           => "photo3.jpg",
            "imageable_id"   => '3',
            "imageable_type" => "App\Models\Product"
        ]);

        //
        Product::create([
            'name'          => 'Climachill Tank',
            'description'   => 'Climachill Tank',
            'collection_id' => '5',
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
        Photo::create([
            "path"           => "photo4.jpg",
            "imageable_id"   => '4',
            "imageable_type" => "App\Models\Product"
        ]);

        //
        Product::create([
            'name'          => 'Nike Element Half Zip',
            'description'   => 'Nike Element Half Zip',
            'collection_id' => '5',
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
        Photo::create([
            "path"           => "photo5.jpg",
            "imageable_id"   => '5',
            "imageable_type" => "App\Models\Product"
        ]);

        //
        Product::create([
            'name'          => 'Nike Gym Vintage FZ Hoodie',
            'description'   => 'Nike Gym Vintage FZ Hoodie',
            'collection_id' => '5',
            'created_at'    => Carbon\Carbon::now(),
            'updated_at'    => Carbon\Carbon::now(),
        ]);
        Photo::create([
            "path"           => "photo6.jpg",
            "imageable_id"   => '6',
            "imageable_type" => "App\Models\Product"
        ]);

    }
}
