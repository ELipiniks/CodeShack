<?php

namespace Infrastructure\Repository;

use Domain\Entity\User;
use Domain\Value\Email;
use Domain\Value\Password;
use PDO;

class UserSessionRepository
{
   // protected $session;

    public function __construct()
    {
        //$this->session=$_SESSION;
    }

    public function storeId($id)
    {
        $_SESSION['user']['id'] = $id;
    }


    public function isAuth()
    {
        return !empty($_SESSION['user']['id']);
    }

    public function getId()
    {
        return $_SESSION['user']['id'];
    }

    public function destroy()
    {
       unset($_SESSION['user']);
    }

}
