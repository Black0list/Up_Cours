<?php

namespace App\Repositories;

use App\Core\config\Database;
use App\DAOs\RoleDAO;
use App\Model\Role;

class RoleRepository
{
    private RoleDAO $RoleDAO;
    public function __construct()
    {
        $this->RoleDAO = new RoleDAO;
    }

    public function getRoleByName(string $role_name)
    {
        $query = "SELECT * FROM roles WHERE role_name LIKE '{$role_name}'"; 
        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();
        $roleObject = $statement->fetchObject(Role::class);

        return $roleObject;
    }

    public function getRoleById(int $role_id)
    {
        return $this->RoleDAO->getRoleById($role_id);
    }

    public function getAll(){
        return $this->RoleDAO->getAll();
    }

    public function getNumberOf(){
        return $this->RoleDAO->getNumberOf();
    }

    public function Delete($role_id){
        return $this->RoleDAO->Delete($role_id);
    }

    public function findOneBy($field, $value){
        return $this->RoleDAO->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->RoleDAO->Update($Object);
    }

    public function Create($Object){
        return $this->RoleDAO->Create($Object);
    }

}