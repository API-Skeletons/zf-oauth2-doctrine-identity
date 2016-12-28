<?php
return [
    'router' => [
        'routes' => [
            'test-api.rest.doctrine.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'TestApi\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'test-api.rest.doctrine.user',
        ],
    ],
    'zf-rest' => [
        'TestApi\\V1\\Rest\\User\\Controller' => [
            'listener' => \TestApi\V1\Rest\User\UserResource::class,
            'route_name' => 'test-api.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ZFTest\OAuth2\Doctrine\Identity\Entity\User::class,
            'collection_class' => \TestApi\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'TestApi\\V1\\Rest\\User\\Controller' => 'HalJson',
        ],
        'accept-whitelist' => [
            'TestApi\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.test-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content-type-whitelist' => [
            'TestApi\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.test-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ZFTest\OAuth2\Doctrine\Identity\Entity\User::class => [
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'test-api.rest.doctrine.user',
                'hydrator' => 'TestApi\\V1\\Rest\\User\\UserHydrator',
            ],
            \TestApi\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test-api.rest.doctrine.user',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \TestApi\V1\Rest\User\UserResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'TestApi\\V1\\Rest\\User\\UserHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'TestApi\\V1\\Rest\\User\\UserHydrator' => [
            'entity_class' => \ZFTest\OAuth2\Doctrine\Identity\Entity\User::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'TestApi\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'TestApi\\V1\\Rest\\User\\Validator',
        ],
    ],
];
