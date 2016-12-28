<?php

$modules = [
    'Zend\\Cache',
    'Zend\\Form',
    'Zend\\I18n',
    'Zend\\Filter',
    'Zend\\Hydrator',
    'Zend\\InputFilter',
    'Zend\\Paginator',
    'Zend\\Router',
    'Zend\\Validator',
    'ZF\\Apigility',
    'ZF\\ApiProblem',
//    'ZF\\Configuration',
    'ZF\\OAuth2',
    'ZF\\MvcAuth',
    'ZF\\Hal',
    'ZF\\ContentNegotiation',
    'ZF\\ContentValidation',
    'ZF\\Rest',
    'ZF\\Rpc',
    'ZF\\Versioning',
    'Phpro\\DoctrineHydrationModule',
    'ZF\\Apigility\\Doctrine\\Server',
    'ZF\\OAuth2\\Doctrine',
    'ZF\\OAuth2\\Doctrine\\Identity',
    'ZFTest\\OAuth2\\Doctrine\\Identity',
    'DoctrineModule',
    'DoctrineORMModule',
    'TestApi',
];

if (class_exists(Zend\Router\Module::class)) {
    $modules[] = 'Zend\\Router';
}

return [
    // This should be an array of module namespaces used in the application.
    'modules' => $modules,

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths' => [
            __DIR__ . '/../../vendor',
            'ZF\\OAuth2\\Doctrine\\Identity' => __DIR__ . '/../src',
            'ZFTest\\OAuth2\\Doctrine\\Identity' => __DIR__ . '/module/Doctrine',
            'TestApi' => __DIR__ . '/module/TestApi',
        ],

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],

    ],
];
