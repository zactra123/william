<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'facebook' => [
        'client_id' => '186293959361262',
        'client_secret' => '683ee8c2b178ac7ac2b306ccc5eaac75',
        'redirect' => 'https://prudentscores.com/facebook/callback',
    ],
    'google' => [
        'client_id' => '42806352568-drauh6hjmu664fmqj0q23qone3ajg7rj.apps.googleusercontent.com',
        'client_secret' => 'Tos8GTWlyfkcpkZjGaYsPg4l',
        'redirect' => 'https://prudentscores.com/google/callback',
    ],

];
