<?php

namespace App\Services;

use App\http\Login;
use App\http\Register;
use App\Model\Role;
use App\Model\Utilisateur;
use Exception;

class AuthService
{
    private UtilisateurService $UtilisateurService;
    private RoleService $RoleService;

    public function __construct()
    {
        $this->RoleService = new RoleService;
        $this->UtilisateurService = new UtilisateurService;
    }

    public function register(Register $RegisterForm)
    {
        $user = $this->UtilisateurService->Create($RegisterForm);

        return $user;
    }

    public function login(Login $LoginForm)
    {
        $user = $this->UtilisateurService->getUserByEmailAndPassword($LoginForm->getProperty("email"), $LoginForm->getProperty("password"));

        if(!$user)
        {
            throw new Exception("Email Or Password is Incorrect");
        }

        return $user;
    }
}