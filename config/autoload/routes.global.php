<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'api.student',
            'path' => '/api/student[/:id]',
            'middleware' => Student\Action\StudentAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
