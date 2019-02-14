<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '281307432594596',         // Your GitHub Client ID
        'client_secret' => '59c039310f15991e6f57e5c95bb0378a', // Your GitHub Client Secret
        'redirect' => 'http://sport07.getenjoyment.net/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '537173792154-h6nrd1nmroa0d2d3c6judmk8kjl2ifs0.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => 'bp2oQutLtzFC6sLBFN_AkIY0', // Your GitHub Client Secret
        'redirect' => 'http://sport07.getenjoyment.net/login/google/callback',
    ]

];
