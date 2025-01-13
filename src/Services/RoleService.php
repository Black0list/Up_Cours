<?php

namespace App\Services;

class RoleService
{
    private RoleRepository $RoleRepository;

    public function __construct()
    {
        $this->RoleRepository = new RoleRepository();
    }


    public function getRoleByName(string $role_name)
    {

    }
}