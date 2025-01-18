<?php

namespace App\Services;

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
        return $this->RoleRepository->getRoleById($role_id);
    }

    public function getAll(){
        return $this->RoleRepository->getAll();
    }

    public function getNumberOf(){
        return $this->RoleRepository->getNumberOf();
    }
}