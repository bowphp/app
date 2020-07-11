<?php
/**
 * The users seeder
 *
 * @see https://github.com/fzaninotto/Faker for all documentation
 */
$faker = \Faker\Factory::create();

$seeds['users'] = [];

foreach (range(1, 5) as $key) {
    $seeds['users'][] = [
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->email,
        'password' => bow_hash('password'), // password
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
}

return $seeds;
