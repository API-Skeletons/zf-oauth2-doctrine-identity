<?php

namespace ZF\OAuth2\Doctrine\Identity;

class ConfigProvider
{
    /**
     * Provide configuration for this component.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    /**
     * Provide dependency configuration for this component.
     *
     * @return array
     */
    public function getDependencyConfig()
    {
        return [
            'factories' => [
                AuthenticationPostListener::class =>
                    AuthenticationPostListenerFactory::class,
            ],
        ];
    }
}
