<?php

return [

    'collections' => [
        'default' => [

            'info' => [
                'title'       => config('app.name'),
                'description' => null,
                'version'     => '1.0.0',
                'contact'     => [],
            ],

            'servers' => [
                [
                    'url'         => env('APP_URL'),
                    'description' => null,
                    'variables'   => [],
                ],
            ],

            'tags' => [],

            'security' => [
            ],

            'route' => [
                'uri'        => '/api/spec',
                'middleware' => [
                ],
            ],

            'middlewares' => [
                'paths'      => [
                    //
                ],
                'components' => [
                    //
                ],
            ],

        ],

    ],

    // Directories to use for locating OpenAPI object definitions.
    'locations'   => [
        'callbacks' => [
            app_path('API/Docs/Callbacks'),
            app_path('API/**/Docs/Callbacks'),
        ],

        'request_bodies' => [
            app_path('API/Docs/RequestBodies'),
            app_path('API/**/Docs/Schemas'),
        ],

        'responses' => [
            app_path('API/Docs/Responses'),
            app_path('API/**/Docs/Responses'),
        ],

        'schemas' => [
            app_path('API/Docs/Schemas'),
            app_path('API/**/Docs/Schemas'),
        ],

        'security_schemes' => [
            app_path('API/Docs/SecuritySchemes'),
        ],
    ],

];
