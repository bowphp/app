<?php

/**
 * The users seeder
 *
 * @see https://github.com/fzaninotto/Faker for all documentation
 */

$seeds['users'] = [];

foreach (range(1, 5) as $key) {
    $seeds['users'][] = [
        'id' => 1,
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->email,
        'pseudo' => $faker->pseudo,
        'password' => $faker->password,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
}

return $seeds;
