<?php

return [
    'database' => [
        'name' => 'rastros-de-fibra_db',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=db',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];