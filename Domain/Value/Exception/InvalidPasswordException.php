<?php

namespace Domain\Value\Exception;

use Exception;

class InvalidPasswordException extends Exception
{
    public function __construct()
    {
        parent::__construct('Password must be at least 6 characters long');
    }
}