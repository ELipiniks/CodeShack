<?php

namespace Domain\Entity;

use Domain\Value\Email;
use Domain\Value\Password;

class Account
{
    private $email;
    private $password;

    public function __construct(Email $email, Password $password)
    {
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function setEmail(Email $email)
    {
        $this->email = $email;
    }

    public function getEmail() : Email
    {
        return $this->email;
    }

    public function setPassword(Password $password)
    {
        $this->password = $password;
    }

    public function getPassword() : Password
    {
        return $this->password;
    }


}