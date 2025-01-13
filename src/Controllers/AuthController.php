<?php

namespace App\Controllers;

use App\http\Login;
use App\http\Register;
use App\Model\Role;
use App\Services\AuthService;

class AuthController{
    private AuthService $AuthService;
    public function __construct()
    {
        $this->AuthService =  new AuthService();
    }
    // public function login(){
    //     $this->AuthService->login();
    //     $_SESSION["user"] = $user;

    //     var_dump($_SESSION['user']);

    //     if($_SESSION['user']->getName() == null){
    //         header('location: /form/auth');
    //     } else {
    //         header('location: /page/users');
    //     }
        
    // }
    public function logout(){
        unset($_SESSION['user']);
        header('location: /form/auth');
    }


    public function register($LoginForm){
        $user = $this->AuthService->register($LoginForm);
        $_SESSION["user"] = $user;
        var_dump($user);
        // header('location: /page/users');
    }
}

?>