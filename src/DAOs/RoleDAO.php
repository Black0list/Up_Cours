<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Role;
use App\Model\Utilisateur;

class RoleDAO
{

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
}