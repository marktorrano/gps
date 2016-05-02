<?php

use App\Models\Meta;

class MetasTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = $this->getFaker();

        DB::table('metas')->delete();

        Meta::create([
            "name"  => "size",
            "value" => 'S'
        ]);
        Meta::create([
            "name"  => "color",
            "value" => $faker->colorName
        ]);
        Meta::create([
            "name"  => "size",
            "value" => 'M'
        ]);
        Meta::create([
            "name"  => "color",
            "value" => $faker->colorName
        ]);
        Meta::create([
            "name"  => "size",
            "value" => 'L'
        ]);
        Meta::create([
            "name"  => "color",
            "value" => $faker->colorName
        ]);

    }
}
