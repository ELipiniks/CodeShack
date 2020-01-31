<?php

namespace Infrastructure\Repository;

use Domain\Entity\Account;
use Domain\Entity\Profile;
use Domain\Entity\User;
use Domain\Value\Email;
use Domain\Value\Password;
use Domain\Value\UserName;
use PDO;

class UserMysqlRepository
{
    protected $database;

    public function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];

        $this->database = new PDO(
            "mysql:dbname=drinkify;host=".DB_HOST,
            DB_USERNAME,
            DB_PASSWORD,
            $options
        );
    }


    public function findById($id)
    {
        $profileQuery = $this->database->prepare(
            "SELECT * FROM profiles WHERE account_id=:account_id"
        );
        $profileQuery->bindValue(':account_id',$id);
        $profileQuery->execute();

        $profileData = $profileQuery->fetch();

        $accountQuery = $this->database->prepare(
            "SELECT * FROM accounts WHERE id=:id"
        );
        $accountQuery->bindValue(':id',$id);
        $accountQuery->execute();

        $accountData = $accountQuery->fetch();


        $profile = new Profile(
            $profileData['firstname'],
            $profileData['lastname'],
            new UserName($profileData['username'])
        );

        $account = new Account(
            new Email($accountData['email']),
            new Password($accountData['password'])
        );


       return new User($account,$profile);

    }

    public function findByEmailAndPassword(Email $email,Password $password)
    {
        $accountQuery = $this->database->prepare(
            "SELECT * FROM accounts WHERE email=:email"
        );
        $accountQuery->bindValue(':email',$email->getValue());
        $accountQuery->execute();
        $accountData = $accountQuery->fetch();

        if($accountData['password'] === $password->getValue()) {
            (new UserSessionRepository())->storeId($accountData['id']);
        }

        header('location:?url=dashboard');
    }

    public function store(User $user)
    {

        $accountQuery = $this->database->prepare("
                INSERT INTO accounts
                (email,password)VALUES(:email,:password)
        ");
        $accountQuery->bindValue(':email',$user->getAccount()->getEmail()->getValue());
        $accountQuery->bindValue(':password',$user->getAccount()->getPassword()->getValue());

        $accountQuery->execute();


        $profileQuery = $this->database->prepare("
                INSERT INTO profiles
                (username,firstname,lastname,account_id)
                VALUES
                (:username,:firstname,:lastname,:account_id)
        ");
        $profileQuery->bindValue(':username',$user->getProfile()->getUserName()->getValue());
        $profileQuery->bindValue(':firstname',$user->getProfile()->getFirstName());
        $profileQuery->bindValue(':lastname',$user->getProfile()->getLastName());
        $profileQuery->bindValue(':account_id',$this->database->lastInsertId());
        $profileQuery->execute();

        header('location:/');
    }
}
