<?php

namespace App\http;

class Login
{
    private string $email;
    private string $password;

    public function __construct(String $email, String $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getProperty($propertyName){
        return $this->$propertyName;
    }

    public function setProperty($propertyName, $value){
        $this->$propertyName = $value;
    }

}