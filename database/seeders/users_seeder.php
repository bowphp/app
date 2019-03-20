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
        'id' => null,
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->email,
        'pseudo' => uniqid(),
        'password' => $faker->password,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
}

return $seeds;
