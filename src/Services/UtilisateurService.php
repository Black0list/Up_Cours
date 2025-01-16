<?php

namespace App\Services;

use App\http\Login;
use App\http\Register;
use App\Model\Utilisateur;
use App\Repositories\UtilisateurRepository;
use Exception;

class UtilisateurService
{
    private UtilisateurRepository $UtilisateurRepository;
    private RoleService $RoleService;

    public function __construct()
    {
        $this->UtilisateurRepository = new UtilisateurRepository;
        $this->RoleService = new RoleService;
    }

    public function Create(Register $RegisterForm)
    {
        $user = new Utilisateur();
        $role = $this->RoleService->getRoleByName($RegisterForm->getProperty("role_name"));
        $status = "suspended";
        if(strtolower($RegisterForm->getProperty("role_name")) == "etudiant"){
            $status = "active";
        }
        $user->Build(["name" => $RegisterForm->getProperty("username"), "email" => $RegisterForm->getProperty("email"), "password" => $RegisterForm->getProperty("password"), "Cpassword" => $RegisterForm->getProperty("Cpassword"), "role" => $role, "status" => $status]);
        
        $this->UtilisateurRepository->Create($user);

        return $user;
    }

    public function getUserByEmailAndPassword(string $email, string $password)
    {
        $user = $this->UtilisateurRepository->getUserByEmailAndPassword($email, $password);

        if(!$user)
        {
            return false;
        }

        $role =  $this->RoleService->getRoleById($user->role_id);
        $user->setRole($role);

        return $user;
    }
}