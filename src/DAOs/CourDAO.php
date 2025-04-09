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

    public function Create($Object){

        $query = "INSERT INTO {$this->TableName()} VALUES(NULL, '{$Object->getTitle()}', '{$Object->getDescription()}', '{$Object->getContent()}', {$Object->getCategory()->getId()}, {$Object->getEnseignant()->getId()})";
        $Db = Database::getInstance()->getConnection();
        $statement = $Db->prepare($query);
        $statement->execute();

        $Object->setId($Db->lastInsertId());

        $tags = $Object->getTags();

        $sql = '';
        for ($i = 0; $i < count($tags); $i++) {
            $sql .= "INSERT INTO cours_tags (cour_id, tag_id) VALUES ({$Object->getId()}, {$tags[$i]});";
        }

        $stmt = $Db->prepare($sql);

        $stmt->execute();
    }

    public function Update($Object){
        $columns = $this->getAttributes();
        $values = ["NULL", $Object->getTitle(), $Object->getDescription(), $Object->getContent(), $Object->getCategory()->getId(), $Object->getEnseignant()->getId()];
        
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

        $query = "DELETE FROM cours_tags WHERE cour_id = {$Object->getId()}";
        $statement = $Db->prepare($query);
        $statement->execute();

        $tags = $Object->getTags();

        $sql = '';
        for ($i = 0; $i < count($tags); $i++) {
            $sql .= "INSERT INTO cours_tags (cour_id, tag_id) VALUES ({$Object->getId()}, {$tags[$i]});";
        }

        $stmt = $Db->prepare($sql);

        $stmt->execute();
    }
}




