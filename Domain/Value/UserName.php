<?php

namespace Domain\Value;

use Domain\Value\Exception\InvalidUsernameException;

class UserName
{
    private $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        try{
            if(strlen($value) >= 6){
                $this->value = $value;
            }else{
                throw new InvalidUsernameException();
            }
        } catch (InvalidUsernameException $exception){
            exit($exception->getMessage());
        }
    }

    public function getValue()
    {
        return $this->value;
    }

}