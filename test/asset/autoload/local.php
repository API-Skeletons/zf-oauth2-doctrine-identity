<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

return [
    'zf-oauth2' => [
        'allow_implicit' => false, // default (set to true when you need to support browser-based or mobile apps)
        'access_lifetime' => 3600, // default (set a value in seconds for access tokens lifetime)
        'enforce_state'  => true,  // default
        'storage' => 'oauth2.doctrineadapter.default',
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'oauth2_doctrine' => [
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => [
                        'storage' => 'oauth2.doctrineadapter.default',
                    ],
                ],
            ],
            'map' => [
                'TestApi\\V1' => 'oauth2_doctrine',
            ],
        ],
    ],

    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOSqlite\Driver',
                'params' => [
                    'memory' => 'true',
                ],
            ],
        ],
    ],
];
