<?php

return [
    'database' => [
        'hostname' => '127.0.0.1',
        'database' => 'pet-safe-app',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'mail' => [
        'from' => 'staff@petsafe.com',
        'from_name' => 'PetSafe Services',
        'smtp' => 'smtp.mailtrap.io',
        'port' => 2525,
        'username' => '8cde45ecb700f3',
        'password' => '0372ed746bf674'
    ]
];


