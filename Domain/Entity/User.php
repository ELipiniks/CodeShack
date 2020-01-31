<?php

namespace Domain\Entity;

class User
{
    private $account;
    private $profile;

    public function __construct(Account $account,Profile $profile)
    {
        $this->setAccount($account);
        $this->setProfile($profile);
    }

    public function setAccount(Account $account)
    {
        $this->account=$account;
    }

    public function getAccount() : Account
    {
        return $this->account;
    }

    public function setProfile(Profile $profile)
    {
        $this->profile=$profile;
    }

    public function getProfile() : Profile
    {
        return $this->profile;
    }

}