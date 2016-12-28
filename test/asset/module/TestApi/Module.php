<?php
namespace TestApi;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use ZF\MvcAuth\MvcAuthEvent;
use Zend\Mvc\MvcEvent;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $serviceManager = $e->getApplication()->getServiceManager();

        // Configure ACL
        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new Authorization\AuthorizationListener(),
            100
        );
    }
}
