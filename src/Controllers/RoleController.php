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
}