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
    'firebase' => [
        'api_key' => 'AIzaSyA7xMlk09-Skzzr-Jt77ZQEFPYSX8VcsLw',
        'auth_domain' => 'kampus-gratis2.firebaseapp.com',
        'database_url' => 'https://kampus-gratis2-default-rtdb.asia-southeast1.firebasedatabase.app',
        'project_id' => 'kampus-gratis2',
        'storage_bucket' => 'kampus-gratis2.appspot.com',
        'messaging_sender_id' => '36215335171',
        'app_id' => '1:36215335171:web:36c5d4234c515fb83aa136',
        'measurement_id' => 'G-M4QT5PH0HJ',
    ],
    
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

];
