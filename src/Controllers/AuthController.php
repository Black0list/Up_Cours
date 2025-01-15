<?php

namespace App\Controllers;

use App\http\Login;
use App\http\Register;
use App\Model\Role;
use App\Services\AuthService;
use Exception;

class AuthController{
    private AuthService $AuthService;
    public function __construct()
    {
        $this->AuthService =  new AuthService();
    }

    public function login(Login $LoginForm)
    {
        try 
        {
            $user = $this->AuthService->login($LoginForm);

            $_SESSION["user"] = $user;

            if($_SESSION['user']->getName() == null){
                header('location: /form/auth');
            } else {
                header('location: /page/users');
            }

        } 
            catch (Exception $e) 
        {
            $_SESSION["message"] =  $e->getMessage();
            header('location: /form/auth');
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        header('location: /form/auth');
    }


    public function register($RegisterForm){
        $user = $this->AuthService->register($RegisterForm);
        $_SESSION["user"] = $user;
        var_dump($user);
        header('location: /page/users');
    }
}

?>