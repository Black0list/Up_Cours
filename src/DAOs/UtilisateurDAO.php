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

    public function Create($user)
    {
        $Db = Database::getInstance()->getConnection();
        $query = "INSERT INTO utilisateurs VALUES(NULL, '{$user->getName()}', '{$user->getEmail()}', '{$user->getPassword()}', {$user->getRole()->getId()}, '{$user->getStatus()}')"; 
        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();
        $user->setId($Db->lastInsertId());
        
        return $user;
    }

    public function TableName(): string{
        return "utilisateurs";
    }

    public function getAttributes():array{
        return ['id', 'name', 'email', 'password', 'role_id', 'status'];
    }

    public function getClass(){
        return Utilisateur::class;
    }


    public function Update($Object){
        $columns = ["id", "name", "email", "role_id", "status"];
        $values = ["NULL", $Object->getName(), $Object->getEmail(), $Object->getRole()->getId(), $Object->getStatus()];
        
        $new_array = array_combine($columns, $values);

        $query_parts = [];

        foreach ($new_array as $key => $value) 
        {
            if($key != "id")
            {
                if(is_string($value))
                {
                    $query_parts[] = $key . " = " . "'$value'";
                } else {
                    $query_parts[] = $key . " = " . $value;
                }
            }
        }

        $fields = implode(", ", $query_parts);

        $query = "UPDATE {$this->TableName()} SET {$fields} WHERE id = {$Object->getId()}";
        $Db = Database::getInstance()->getConnection();
        $statement = $Db->prepare($query);
        $statement->execute();
    }

}

// $user = new Utilisateur;
// $role = new Role;
// $role->Build(["id" => 1, "role_name" => "admin", "description" => "aaaaaaaaaaaaaaaaa"]);
// $user->Build(["name" => "hadoui", "id" => 1, "role" => $role]);

// $userDAO = new UtilisateurDAO;
// $userDAO->Create($user);
