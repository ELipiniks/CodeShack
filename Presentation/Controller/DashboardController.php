<?php

namespace Presentation\Controller;

use Framework\Template;
use Infrastructure\Repository\UserMysqlRepository;
use Infrastructure\Repository\UserSessionRepository;

class DashboardController
{
    protected $userMysqlRepository;
    protected $userSessionRepository;

    public function __construct()
    {
        $this->userMysqlRepository = new UserMysqlRepository();
        $this->userSessionRepository = new UserSessionRepository();
    }

    public function index()
    {
        $userId = $this->userSessionRepository->getId();
        $user = $this->userMysqlRepository->findById($userId);

        (new Template)
            ->assign([
                'heading' => 'Drinkify / Dashboard',
                'user' => $user,
            ])
            ->render('dashboard/index.php');
    }
}