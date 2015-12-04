<?php

namespace Student\Entity;

use Common\Entity\EntityInterface;

class StudentEntity implements EntityInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $classroomId;

    /** @var int */
    private $userIcon;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var string */
    private $earnedStarts;

    /** @var string */
    private $lastModified;

    /** @var string */
    private $addedAt;

    /**
     * @return bool
     */
    public function isValid()
    {
        return !!$this->id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getClassroomId()
    {
        return $this->classroomId;
    }

    /**
     * @param int $classroomId
     */
    public function setClassroomId($classroomId)
    {
        $this->classroomId = $classroomId;
    }

    /**
     * @return int
     */
    public function getUserIcon()
    {
        return $this->userIcon;
    }

    /**
     * @param int $userIcon
     */
    public function setUserIcon($userIcon)
    {
        $this->userIcon = $userIcon;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEarnedStarts()
    {
        return $this->earnedStarts;
    }

    /**
     * @param string $earnedStarts
     */
    public function setEarnedStarts($earnedStarts)
    {
        $this->earnedStarts = $earnedStarts;
    }

    /**
     * @return string
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param string $lastModified
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
    }

    /**
     * @return string
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * @param string $addedAt
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;
    }
}
