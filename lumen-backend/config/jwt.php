<?php

return [

    /*
    |--------------------------------------------------------------------------
    | JWT Authentication Secret
    |--------------------------------------------------------------------------
    |
    | Set this in your .env file using `php artisan jwt:secret`
    |
    */

    'secret' => env('JWT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | JWT Authentication Keys
    |--------------------------------------------------------------------------
    |
    | These are used when using asymmetric algorithms like RS256, ES256, etc.
    |
    */

    'keys' => [
        'public' => env('JWT_PUBLIC_KEY'),
        'private' => env('JWT_PRIVATE_KEY'),
        'passphrase' => env('JWT_PASSPHRASE'),
    ],

    /*
    |--------------------------------------------------------------------------
    | JWT Token Expiration Time
    |--------------------------------------------------------------------------
    |
    | Time (in minutes) the token will be valid for.
    | Default is 60 minutes (1 hour).
    |
    */

    'ttl' => env('JWT_TTL', 60),

    /*
    |--------------------------------------------------------------------------
    | Refresh Token Expiration Time
    |--------------------------------------------------------------------------
    |
    | Time (in minutes) within which the user can refresh the token.
    | Default is 20160 minutes (14 days).
    |
    */

    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160),

    /*
    |--------------------------------------------------------------------------
    | JWT Hashing Algorithm
    |--------------------------------------------------------------------------
    |
    | Determines which algorithm will be used to sign the token.
    | Default: HS256
    |
    */

    'algo' => env('JWT_ALGO', 'HS256'),

    /*
    |--------------------------------------------------------------------------
    | Required Claims
    |--------------------------------------------------------------------------
    |
    | Defines which claims are mandatory in the JWT payload.
    |
    */

    'required_claims' => [
        'iss',
        'iat',
        'exp',
        'nbf',
        'sub',
        'jti',
    ],

    /*
    |--------------------------------------------------------------------------
    | Persistent Claims
    |--------------------------------------------------------------------------
    |
    | Define claims that should persist when refreshing the token.
    |
    */

    'persistent_claims' => [],

    /*
    |--------------------------------------------------------------------------
    | Lock Subject
    |--------------------------------------------------------------------------
    |
    | If enabled, prevents one authentication model from impersonating another.
    |
    */

    'lock_subject' => true,

    /*
    |--------------------------------------------------------------------------
    | Leeway (Clock Skew Tolerance)
    |--------------------------------------------------------------------------
    |
    | Allows some leeway for small differences in server clocks.
    |
    */

    'leeway' => env('JWT_LEEWAY', 0),

    /*
    |--------------------------------------------------------------------------
    | Blacklist Settings
    |--------------------------------------------------------------------------
    |
    | Determines if blacklisting of tokens is enabled and sets grace period.
    |
    */

    'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),
    'blacklist_grace_period' => env('JWT_BLACKLIST_GRACE_PERIOD', 0),

    /*
    |--------------------------------------------------------------------------
    | Cookie Encryption
    |--------------------------------------------------------------------------
    |
    | Determines if JWT tokens stored in cookies should be decrypted.
    |
    */

    'decrypt_cookies' => false,

    /*
    |--------------------------------------------------------------------------
    | JWT Service Providers
    |--------------------------------------------------------------------------
    |
    | Define which providers are used for JWT handling.
    |
    */

    'providers' => [
        'jwt' => Tymon\JWTAuth\Providers\JWT\Lcobucci::class,
        'auth' => Tymon\JWTAuth\Providers\Auth\Illuminate::class,
        'storage' => Tymon\JWTAuth\Providers\Storage\Illuminate::class,
    ],
];
