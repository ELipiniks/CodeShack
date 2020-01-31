<?php

namespace Domain\Value;

use Domain\Value\Exception\InvalidEmailException;

class Email
{
    private $value;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    public function setValue($value)
    {
        try{
            if(filter_var($value,FILTER_VALIDATE_EMAIL)){
                $this->value = $value;
            }else{
                throw new InvalidEmailException();
            }
        }catch (InvalidEmailException $exception){
            exit($exception->getMessage());
        }
    }

    public function getValue()
    {
        return $this->value;
    }

}