<?php

namespace Student\Service;

use Common\Db\Traits\FindByIdTrait;
use Common\Service\AbstractService;
use Common\Service\ServiceInterface;

class StudentService extends AbstractService implements
    ServiceInterface
{
    use FindByIdTrait;
}
