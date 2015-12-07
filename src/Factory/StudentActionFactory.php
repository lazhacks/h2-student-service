<?php

namespace Student\Factory;

use Student\Action\StudentAction;
use Student\Service\StudentService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class StudentActionFactory
{
    /**
     * @param ContainerInterface $container
     * @return StudentAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $router         = $container->get(RouterInterface::class);
        $studentService = $container->get(StudentService::class);
        $classroom      = $container->get('ClassroomWebService');

        return new StudentAction(
            $router,
            $studentService,
            $classroom
        );
    }
}