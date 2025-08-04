<?php
return [
    'paths' => ['*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    'allowed_origins' => ['https://ph-tech.dk'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
