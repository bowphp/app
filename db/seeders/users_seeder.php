<?php

$seeds['users'] = [];

foreach (range(1, 5) as $key) {
    $seeds['users'][] = [
        'id' => faker('autoincrement'),
        'name' => faker('name'),
        'description' => faker('string'),
        'email' => faker('email'),
        'pseudo' => faker('pseudo'),
        'password' => bow_hash('password'),
        'created_at' => faker('date'),
        'updated_at' => faker('date')
    ];
}

return $seeds;
