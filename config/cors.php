<?php


return [
    'paths' => [
        'api/*',
        'admin/*',
        'storage/*',
        'sanctum/csrf-cookie',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 86400, // ← cache preflight 24 jam

    'supports_credentials' => false,
];