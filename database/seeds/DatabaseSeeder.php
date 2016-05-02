<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    protected $faker;

    public function getFaker()
    {

        if (empty($this->faker))
        {
            $faker = Faker\Factory::create();
            $faker->addProvider(new Faker\Provider\Base($faker));
            $faker->addProvider(new Faker\Provider\Lorem($faker));
        }

        return $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
//        $this->call(ItemsTableSeeder::class);
//        $this->call(BrandsTableSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
        $this->call(MetasTableSeeder::class);
//        $this->call(ProductsTableSeeder::class);

        $this->command->info('Tables seeded!');
    }
}


