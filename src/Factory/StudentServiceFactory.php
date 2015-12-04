<?php

namespace Student\Factory;

use Common\Db\Mapper\Mapper;
use Student\Entity\StudentEntity;
use Student\Service\StudentService;
use Interop\Container\ContainerInterface;

class StudentServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return StudentService
     */
    public function __invoke(ContainerInterface $container)
    {
        $adapter             = $container->get('DbAdapter');
        $entityPrototype     = new StudentEntity();

        $mapper = new Mapper(
            $adapter,
            $entityPrototype
        );

        $mapper->setEntityTable('student');

        return new StudentService(
            $mapper,
            $entityPrototype
        );
    }
}