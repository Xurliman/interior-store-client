<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'storage/*', 'admin/*'], // Ensure paths include your desired endpoints

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // Allows requests from any origin

    'allowed_origins_patterns' => ['*'],

    'allowed_headers' => ['*'], // Allows all headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
