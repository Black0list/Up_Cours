<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Role;
use App\Daos\GenericDAO;

class TagDAO extends GenericDAO{

    private static $Db;

    public function __construct()
    {
        
    }

    public function getTagsCour(int $cour_id)
    {
        $Db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM". $this->TableName() ."WHERE id = '{$cour_id}'"; 
        $statement = $Db->prepare($query);
        $statement->execute();
        $roleObj = $statement->fetchObject(Role::class);

        return $roleObj; 
    }

    public function TableName(): string{
        return "tags";
    }

    public function getAttributes(): array{
        return ['id', 'nom', 'description'];
    }

    public function getClass(){
        return Role::class;
    }
}

