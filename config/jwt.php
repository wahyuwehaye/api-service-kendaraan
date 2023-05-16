<?php

use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;

/*
|--------------------------------------------------------------------------
| JSON Web Token Configuration
|--------------------------------------------------------------------------
|
| This file is used to configure the settings and options for JSON Web Token (JWT)
| authentication in your application. You can customize this file to fit the
| requirements of your application.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | JWT Configuration
    |--------------------------------------------------------------------------
    |
    | This section defines the configuration options for JSON Web Token (JWT)
    | authentication in your application.
    |
    */

    'jwt' => [

        /*
        |--------------------------------------------------------------------------
        | JWT Secret
        |--------------------------------------------------------------------------
        |
        | This option specifies the secret key used to sign the JWT tokens.
        | Make sure to keep this value secure. You can use the `php artisan jwt:secret` command
        | to generate a secure random key.
        |
        */

        'secret' => env('JWT_SECRET'),

        /*
        |--------------------------------------------------------------------------
        | JWT Lifetime
        |--------------------------------------------------------------------------
        |
        | This option specifies the lifetime (in minutes) of the JWT tokens.
        | After this period, the token will be considered expired.
        |
        */

        'lifetime' => env('JWT_LIFETIME', 60),

        /*
        |--------------------------------------------------------------------------
        | JWT Refresh Lifetime
        |--------------------------------------------------------------------------
        |
        | This option specifies the lifetime (in minutes) of the JWT refresh tokens.
        | After this period, the refresh token will be considered expired.
        |
        */

        'refresh_lifetime' => env('JWT_REFRESH_LIFETIME', 20160),

        /*
        |--------------------------------------------------------------------------
        | JWT Signer
        |--------------------------------------------------------------------------
        |
        | This option specifies the signer used to sign the JWT tokens.
        | The available signers are `Lcobucci\JWT\Signer\Hmac\Sha256`, `Lcobucci\JWT\Signer\Rsa\Sha256`,
        | `Lcobucci\JWT\Signer\Ecdsa\Sha256`, and more.
        |
        */

        'signer' => Sha256::class,

        /*
        |--------------------------------------------------------------------------
        | JWT Validation Constraints
        |--------------------------------------------------------------------------
        |
        | This option specifies the validation constraints for the JWT tokens.
        | You can customize the validation rules according to your requirements.
        |
        */

        'validation_constraints' => [
            'iss',
            'iat',
            'exp',
            'nbf',
            'jti',
        ],
        'ttl' => 60, // Waktu kedaluwarsa token (dalam menit)
        'refresh_ttl' => 20160, // Waktu kedaluwarsa refresh token (dalam menit)
        'providers' => [
            'users' => [
                'driver' => 'eloquent',
                'model' => \App\Models\User::class, // Model pengguna Anda
            ],
        ],

    ],

];
