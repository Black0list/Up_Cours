<?php

namespace App\Services;

use App\http\Login;
use App\http\Register;
use App\Model\Role;
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
        $status = "pending";
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

        if(!$user->role_id) return $user->setRole((new Role())->Build(["id" => 0, 'role_name' => "No role", "description" => "No des"]));

        $role =  $this->RoleService->getRoleById($user->role_id);
        $user->setRole($role);

        return $user;
    }

    public function findOneBy($field, $value){
        $user = $this->UtilisateurRepository->findOneBy($field, $value);
        if(!$user || !$value) return (new Utilisateur)->Build(["name" => "No AUTHOR"]);
        return $user;
    }

    public function getAll(){
        $users =  $this->UtilisateurRepository->getAll();
        $role = new Role;
        $role->Build(["id" => 0, 'role_name' => "No role", "description" => "No des"]);
        foreach($users as $value){
            if (gettype($value) === "object") {
                if(!$value->role_id){
                    $value->setRole($role);
                } else {
                    $role = $this->RoleService->getRoleById($value->role_id);
                    $value->setRole($role);
                }
            }            
        }
        return $users;
    }

    public function Delete($user_id){
        return $this->UtilisateurRepository->Delete($user_id);
    }

    public function getNumberOf(){
        return $this->UtilisateurRepository->getNumberOf();
    }

    public function getAllBy($field, $value){
        $users =  $this->UtilisateurRepository->getAllBy($field, $value);

        foreach($users as $value){
            if (gettype($value) === "object") {
                $role = $this->RoleService->getRoleById($value->role_id);
                $value->setRole($role);
            }            
        }
        return $users;
    }

    public function AcceptRequest($user_id){
        $this->UtilisateurRepository->AcceptRequest($user_id);
    }

    // public function DenyRequest($user_id){
    //     $this->UtilisateurRepository->DenyRequest($user_id);
    // }

    public function Update($Object){
        return $this->UtilisateurRepository->Update($Object);
    }

}