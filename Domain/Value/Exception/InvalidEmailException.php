<?php

namespace Domain\Value\Exception;

use Exception;

class InvalidEmailException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid email provided');
    }
}