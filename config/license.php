<?php

return [
    'license_key' => env('LICENSE_KEY', 'default-license-key'),
    'store_id'    => env('STORE_ID', 'default-store-id'),
    'update_available' => env('UPDATE_AVAILABLE', false),
    'licensing_server_url' => env('LICENSING_STORE_URL', 'http://127.0.0.1:8001'),
];
