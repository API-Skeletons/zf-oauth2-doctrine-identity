<?php

namespace ZFTest\OAuth2\Doctrine\Identity;

use Zend\EventManager\EventManager;
use Zend\ModuleManager\ModuleManager;
use Zend\ServiceManager\ServiceManager;
use ZF\OAuth2\Doctrine\EventListener\DynamicMappingSubscriber;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Zend\Mvc\MvcEvent;

class Module
{
    /**
     * Retrieve autoloader configuration
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array('namespaces' => array(
            __NAMESPACE__ => __DIR__ . '/src/',
        )));
    }

    /**
     * Retrieve module configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
    }
}
