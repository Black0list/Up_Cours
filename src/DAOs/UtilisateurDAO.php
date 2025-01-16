<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\DAOs\GenericDAO;
use App\Model\Role;
use App\Model\Utilisateur;

class UtilisateurDAO extends GenericDAO{


    private static $Db;

    public function __construct()
    {
        
    }

    // public function Create(Utilisateur $user)
    // {
    //     $Db = Database::getInstance()->getConnection();
    //     $query = "INSERT INTO utilisateurs VALUES(NULL, '{$user->getName()}', '{$user->getEmail()}', '{$user->getPassword()}', {$user->getRole()->getId()}, '{$user->getStatus()}')"; 
    //     $statement = Database::getInstance()->getConnection()->prepare($query);
    //     $statement->execute();
    //     $user->setId($Db->lastInsertId());
    //     // var_dump($user);
    //     return $user;
    // }

    public function TableName(): string{
        return "utilisateurs";
    }

    public function getAttributes():array{
        return ['id', 'name', 'email', 'password', 'role_id', 'status'];
    }

}

// $user = new Utilisateur;
// $role = new Role;
// $role->Build(["id" => 1, "role_name" => "admin", "description" => "aaaaaaaaaaaaaaaaa"]);
// $user->Build(["name" => "hadoui", "id" => 1, "role" => $role]);

// $userDAO = new UtilisateurDAO;
// $userDAO->Create($user);
