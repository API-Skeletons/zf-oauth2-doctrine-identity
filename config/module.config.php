<?php

use ZF\OAuth2\Doctrine\Identity;

return [
    'service_manager' => [
        'factories' => [
            Identity\AuthenticationPostListener::class =>
                Identity\AuthenticationPostListenerFactory::class,
        ],
    ],
];