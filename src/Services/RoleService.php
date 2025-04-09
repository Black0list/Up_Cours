<?php

namespace App\Services;

use App\Model\Role;
use App\Repositories\RoleRepository;

class RoleService
{
    private RoleRepository $RoleRepository;

    public function __construct()
    {
        $this->RoleRepository = new RoleRepository();
    }


    public function getRoleByName(string $role_name)
    {
        return $this->RoleRepository->getRoleByName($role_name);
    }

    public function getRoleById(int $role_id)
    {
        $role =  $this->RoleRepository->getRoleById($role_id);
        if(!$role || !$role_id) return (new Role())->Build(['role_name' => "No role"]);
        return $role;
    }

    public function getAll(){
        return $this->RoleRepository->getAll();
    }

    public function getNumberOf(){
        return $this->RoleRepository->getNumberOf();
    }

    public function Delete($role_id){
        return $this->RoleRepository->Delete($role_id);
    }

    public function findOneBy($field, $value){
        return $this->RoleRepository->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->RoleRepository->Update($Object);
    }

    public function Create($Object){
        return $this->RoleRepository->Create($Object);
    }
}