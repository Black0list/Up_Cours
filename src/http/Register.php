<?php

namespace App\http;

class Register
{
    private string $username;
    private string $email;
    private string $password;
    private string $Cpassword;
    private string $role_name;

    public function __construct(string $username, String $email, string $password, string $Cpassword, string $role_name)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->Cpassword = $Cpassword;
        $this->role_name = $role_name;
    }


    public function getProperty($propertyName)
    {
        return $this->$propertyName;
    }

    public function setProperty($propertyName, $value)
    {
        $this->$propertyName = $value;
    }

    // public function getUsername()
    // {
    //     return $this->username;
    // }

    // public function getEmail()
    // {
    //     return $this->email;
    // }

    // public function getPassword()
    // {
    //     return $this->password;
    // }

    // public function getCPassword()
    // {
    //     return $this->Cpassword;
    // }

    // public function getRoleName()
    // {
    //     return $this->role_name;
    // }

    // public function setUsername($username)
    // {
    //     $this->username = $username;
    // }

    // public function setEmail($email)
    // {
    //     $this->email = $email;
    // }

    // public function setPassword($password)
    // {
    //     $this->password = $password;
    // }

    // public function setcPassword($Cpassword)
    // {
    //     $this->Cpassword = $Cpassword;
    // }

    // public function setRoleName($role_name)
    // {
    //     $this->role_name = $role_name;
    // }
}