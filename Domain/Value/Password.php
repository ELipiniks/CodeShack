<?php

namespace Domain\Value;

use Domain\Value\Exception\InvalidPasswordException;

class Password
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
                $this->value = md5($value);
            }else{
                throw new InvalidPasswordException();
            }
        } catch (InvalidPasswordException $exception){
            exit($exception->getMessage());
        }
    }

    public function getValue()
    {
        return $this->value;
    }
}