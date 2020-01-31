<?php

namespace Presentation\Controller;

use Domain\Entity\Account;
use Domain\Entity\Profile;
use Domain\Entity\User;

use Domain\Value\Email;
use Domain\Value\Password;
use Domain\Value\UserName;

use Framework\Template;
use Infrastructure\Repository\UserMysqlRepository;

class SignUpController
{

    public function index()
    {
        (new Template)
            ->assign(['heading' => 'Drinkify / Sign up'])
            ->render('sign-up/index.php');
    }

    public function register()
    {

        $profile = new Profile(
            $_POST['firstname'],
            $_POST['lastname'],
            new UserName($_POST['username'])
        );

        $account = new Account(
            new Email($_POST['email']),
            new Password($_POST['password'])
        );

        $user = new User($account,$profile);

        $userMysqlRepository = new UserMysqlRepository();
        $userMysqlRepository->store($user);
    }

}