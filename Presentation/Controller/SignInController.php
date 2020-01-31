<?php

namespace Presentation\Controller;

use Domain\Value\Email;
use Domain\Value\Password;

use Framework\Template;
use Infrastructure\Repository\UserMysqlRepository;

class SignInController
{

    public function index()
    {
        (new Template)
            ->assign(['heading' => 'Drinkify'])
            ->render('welcome/index.php');
    }

    public function auth()
    {
        $userMysqlRepository = new UserMysqlRepository();
        $userMysqlRepository->findByEmailAndPassword(
            new Email($_POST['email']),
            new Password($_POST['password'])
        );
    }

}