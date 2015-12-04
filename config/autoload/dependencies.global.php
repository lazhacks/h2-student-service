<?php

return [
    'dependencies' => [
        'factories' => [
            Student\Action\StudentAction::class => Student\Factory\StudentActionFactory::class,
            Student\Service\StudentService::class => Student\Factory\StudentServiceFactory::class,

            Zend\Expressive\Application::class => Zend\Expressive\Container\ApplicationFactory::class,
        ],
        'abstract_factories' => [
            Zend\Db\Adapter\AdapterAbstractServiceFactory::class,
            Zend\Cache\Service\StorageCacheAbstractServiceFactory::class
        ],

        'initializers' => [
            Common\Cache\RedisCacheInitializer::class
        ],
    ]
];
