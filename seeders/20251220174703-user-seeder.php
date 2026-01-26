<?php

use App\Models\User;
use Faker\Factory as FakerFactory;

class UserSeeder20251220174703
{
    public function run()
    {
        $faker = FakerFactory::create();

        foreach (range(1, 5) as $value) {
            $user = [
                'name' => $faker->name,
                'description' => $faker->text(100),
                'email' => $faker->email,
                'password' => app_hash('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            User::create($user);
        }
    }
}
