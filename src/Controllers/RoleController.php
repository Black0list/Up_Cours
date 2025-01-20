<?php

namespace App\Controllers;

use App\Services\RoleService;

class RoleController{

    private RoleService $RoleService;

    public function __construct()
    {
        $this->RoleService = new RoleService;
    }

    public function getAll(){
        return $this->RoleService->getAll();
    }

    public function getNumberOf(){
        return $this->RoleService->getNumberOf();
    }

    public function Delete($role_id){
        return $this->RoleService->Delete($role_id);
    }

    public function findOneBy($field, $value){
        return $this->RoleService->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->RoleService->Update($Object);
    }

    public function Create($Object){
        return $this->RoleService->Create($Object);
    }
}