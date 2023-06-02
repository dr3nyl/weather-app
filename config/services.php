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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'weather'=>[
        'endpoint' => env('WEATHER_ENDPOINT'),
        'key' => env('WEATHER_API_KEY'),
        'first_query' => env('WEATHER_FIRST_QUERY'),
        'second_query' => env('WEATHER_SECOND_QUERY'),
    ],

    'place'=>[
        'endpoint' => env('PLACE_ENDPOINT'),
        'search_endpoint' => env('PLACE_SEARCH_ENDPOINT'),
        'key' => env('PLACE_API_KEY'),
        'query' => env('PLACE_QUERY'),
        
    ],

];
