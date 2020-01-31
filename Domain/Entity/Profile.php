<?php

namespace Domain\Entity;

use \Domain\Value\UserName;
use http\Client\Curl\User;

class Profile
{
    private $firstName;
    private $lastName;
    private $userName;

    public function __construct($firstName,$lastName,UserName $userName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setUserName($userName);
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setUserName(UserName $userName)
    {
        $this->userName = $userName;
    }

    public function getUserName() : UserName
    {
        return $this->userName;
    }

}