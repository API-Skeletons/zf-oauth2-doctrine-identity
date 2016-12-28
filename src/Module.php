<?php

namespace ZF\OAuth2\Doctrine\Identity;

use Zend\Mvc\ModuleRouteListener;
use ZF\MvcAuth\MvcAuthEvent;
use Zend\Mvc\MvcEvent;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $serviceManager = $e->getApplication()->getServiceManager();

        // Attach an event to replace the Identity with a DoctrineAuthenticatedIdentity
        $authenticationPostListener = $serviceManager->get(AuthenticationPostListener::class);
        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHENTICATION_POST,
            $authenticationPostListener,
            100
        );
    }
}
