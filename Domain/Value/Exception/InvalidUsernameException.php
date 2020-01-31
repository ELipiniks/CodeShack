<?php

namespace Domain\Value\Exception;

use Exception;

class InvalidUsernameException extends Exception
{
    public function __construct()
    {
        parent::__construct('Username must be at least 6 characters long');
    }
}