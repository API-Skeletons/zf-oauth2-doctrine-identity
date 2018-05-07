<?php

namespace ZF\OAuth2\Doctrine\Identity;

use Interop\Container\ContainerInterface;

class AuthenticationPostListenerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthenticationPostListener($container);
    }
}
