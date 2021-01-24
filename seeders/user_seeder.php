<?php
/**
 * The users tabler seeder
 *
 * @see https://github.com/fzaninotto/Faker for all documentation
 */
$faker = \Faker\Factory::create();

$seeds = [];

foreach (range(1, 5) as $key) {
    $seeds[] = [
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->email,
        'password' => bow_hash('password'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
}

return ['users' => $seeds];
