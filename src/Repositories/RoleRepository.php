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

}