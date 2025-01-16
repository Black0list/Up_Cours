<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Role;
use App\Daos\GenericDAO;

class RoleDAO extends GenericDAO{

    private static $Db;

    public function __construct()
    {
        
    }

    public function getRoleById(int $role_id)
    {
        $Db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM roles WHERE id = '{$role_id}'"; 
        $statement = $Db->prepare($query);
        $statement->execute();
        $roleObj = $statement->fetchObject(Role::class);

        return $roleObj; 
    }

    public function TableName(): string{
        return "roles";
    }

    public function getAttributes(): array{
        return ['id', 'role_name', 'description'];
    }
}

