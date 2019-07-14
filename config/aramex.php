<?php
return [
    'test' => [
        'country_code' => '',
        'entity' => '',
        'number' => '',
        'pin' => '',
        'username' => '',
        'password' => ''
    ],
    'live' => [
        'country_code' => env('ARAMEX_COUNTRY_CODE'),
        'entity' => env('ARAMEX_ENTITY'),
        'number' => env('ARAMEX_NUMBER'),
        'pin' => env('ARAMEX_PIN'),
        'username' => env('ARAMEX_USERNAME'),
        'password' => env('ARAMEX_PASSWORD')
    ]
];