<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Role;
use App\Model\Utilisateur;

class UtilisateurDAO
{

    private static $Db;

    public function __construct()
    {
        
    }

    public function Create(Utilisateur $user)
    {
        $Db = Database::getInstance()->getConnection();
        $query = "INSERT INTO utilisateurs VALUES(NULL, '{$user->getName()}', '{$user->getEmail()}', '{$user->getPassword()}', {$user->getRole()->getId()}, '{$user->getStatus()}')"; 
        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();
        $user->setId($Db->lastInsertId());
        // var_dump($user);
        return $user;
    }
}