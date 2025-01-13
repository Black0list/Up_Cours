<?php

namespace App\Services;

use App\http\Login;
use App\Model\Role;
use App\Model\Utilisateur;

class AuthService
{
    private UtilisateurService $UtilisateurService;
    private RoleService $RoleService;

    public function __construct()
    {
        $this->RoleService = new RoleService;
        $this->UtilisateurService = new UtilisateurService;
    }

    public function register(Login $LoginForm)
    {
        $user = new Utilisateur();
        $role = $this->RoleService->getRoleByName($LoginForm->getProperty("role_name"));
        $user->Build(["name" => $LoginForm->getProperty("username"), "email" => $LoginForm->getProperty("email"), "password" => $LoginForm->getProperty("password"), "Cpassword" => $LoginForm->getProperty("Cpassword"), "role" => $role]);
        return $user;
    }
}