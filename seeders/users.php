<?php

use Faker\Factory;
use App\Models\User;

/**
 * The users tabler seeder
 *
 * @see https://fakerphp.github.io for all documentation
 */

$faker = Factory::create();

$seeds = [];

foreach (range(1, 5) as $key) {
    $seeds[] = [
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->email,
        'password' => app_hash('password'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
}

return [User::class => $seeds];
