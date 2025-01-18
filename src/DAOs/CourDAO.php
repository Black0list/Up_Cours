<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Cour;
use PDO;

class CourDAO extends GenericDAO
{
    private static $Db;



    public function __construct()
    {
        
    }
    public function TableName(): string
    {
        return "cours";
    }

    public function getAttributes(): array{
        return ['id', 'title', 'description', 'content', 'categorie_id', 'enseignant_id'];
    }
    
    public function getClass(){
        return Cour::class;
    }


    public function fetchAllCours(){
        $Db = Database::getInstance()->getConnection();
        $query = "SELECT ".$this->TableName().".* FROM {$this->TableName()} WHERE {$this->TableName()}.enseignant_id = {$_SESSION['user']->getId()}";
        echo $query;
        $statement = $Db->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_CLASS, $this->getClass());
        
        var_dump($result);
        die();
    }
}




