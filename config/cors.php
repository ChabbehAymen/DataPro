<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for configuring CORS (Cross-Origin Resource Sharing) settings
    | for your application. By default, the CORS configuration is set to allow
    | any origin, but you can change that as necessary.
    |
    | For more information, check the documentation:
    | https://laravel.com/docs/8.x/cors
    |
    */

    'paths' => ['api/*'],
    'allowed_origins' => ['http://127.0.0.1:8000'], // Adjust to match your Vue frontend URL


    /*
    |--------------------------------------------------------------------------
    | Allowed HTTP Methods
    |--------------------------------------------------------------------------
    |
    | Here you can specify which HTTP methods are allowed for cross-origin requests.
    | The default is all methods ('*'), but you can limit this for security.
    |
    */

    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | This controls which origins can make requests to your API. You can
    | specify an array of URLs or set this to '*' to allow all origins.
    |
    | Example: ['http://example.com', 'http://localhost:3000']
    */

    // 'allowed_origins' => ['*'], // Or use specific origins like ['http://localhost:3000']

    /*
    |--------------------------------------------------------------------------
    | Allowed Request Headers
    |--------------------------------------------------------------------------
    |
    | This specifies which request headers are allowed during cross-origin requests.
    | You can allow all headers by setting this to '*'.
    |
    */

    'allowed_headers' => ['*'], // Allow all headers

    /*
    |--------------------------------------------------------------------------
    | Exposed Response Headers
    |--------------------------------------------------------------------------
    |
    | You can specify which headers are allowed to be exposed to the browser
    | in response to a cross-origin request.
    |
    */

    'exposed_headers' => [], // Leave empty for now or add any custom headers you want to expose

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | The max age defines how long the results of a preflight request can be cached.
    | Set to 0 to disable caching.
    |
    */

    'max_age' => 0, // No caching for preflight requests

    /*
    |--------------------------------------------------------------------------
    | Support Credentials
    |--------------------------------------------------------------------------
    |
    | This will determine whether or not the browser should send cookies
    | for cross-origin requests. You can set this to `true` if your app
    | needs to support cookies.
    |
    */

    'supports_credentials' => false, // Set to true if you need cookies to be sent with API requests

];
