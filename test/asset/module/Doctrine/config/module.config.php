<?php

return [
    'doctrine' => [
        'driver' => [
            'test_driver' => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                'paths' => [
                    0 => __DIR__ . '/orm',
                ],
            ],
            'orm_default' => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
                'drivers' => [
                    'ZFTest\\OAuth2\\Doctrine\\Identity\\Entity' => 'test_driver',
                ],
            ],
        ],
    ],
];
