<?php
use App\Models\User;

class UsersTableSeeder extends DatabaseSeeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->getFaker();

        DB::table('users')->delete();

        User::create([
            "name"     => 'admin',
            "email"    => 'admin@gmail.com',
            "password" => Hash::make("password"),
            "is_admin" => '1',
        ]);

        User::create([
            "name"     => 'user',
            "email"    => 'user@gmail.com',
            "password" => Hash::make("password"),
            "is_admin" => '0',
        ]);
        User::create([
            "name"     => 'mark',
            "email"    => 'markstorrano@gmail.com',
            "password" => Hash::make("password"),
            "is_admin" => '1',
        ]);

        for ($i = 0; $i < 10; $i++)
        {
            $name = $faker->word;
            $email = $faker->email;
            $password = Hash::make("password");
            $is_admin = 0;

            User::create([
                "name"     => $name,
                "email"    => $email,
                "password" => $password,
                "is_admin" => $is_admin,
            ]);
        }

    }
}
