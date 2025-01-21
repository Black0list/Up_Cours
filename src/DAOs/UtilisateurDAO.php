<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\DAOs\GenericDAO;
use App\Model\Cour;
use App\Model\Role;
use App\Model\Utilisateur;
use PDO;

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

    public function Subscribe(int $cour_id, int $etudiant_id){
        
        $query = "SELECT * from subscriptions WHERE cour_id = $cour_id AND etudiant_id = $etudiant_id";
        $Db = Database::getInstance()->getConnection();
        $statement = $Db->prepare($query);
        $statement->execute();

        if($statement->rowCount() >= 1) {
            $query = "DELETE from subscriptions WHERE cour_id = $cour_id AND etudiant_id = $etudiant_id";
            $Db = Database::getInstance()->getConnection();
            $statement = $Db->prepare($query);
            $statement->execute();
        } else {
            $query = "INSERT INTO subscriptions (cour_id, etudiant_id) VALUES({$cour_id}, {$etudiant_id})";
            $Db = Database::getInstance()->getConnection();
            $statement = $Db->prepare($query);
            $statement->execute();
        }


    }

    public function getAllSubscriptions($user_id){
        $query = "SELECT cours.* FROM cours JOIN subscriptions ON subscriptions.cour_id = cours.id WHERE subscriptions.etudiant_id = $user_id";
        $Db = Database::getInstance()->getConnection();
        $statement = $Db->prepare($query);
        $statement->execute();
        $subscriptions = $statement->fetchAll(PDO::FETCH_CLASS, Cour::class);

        return $subscriptions;
    }

}


