<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Role;
use App\Daos\GenericDAO;
use App\Model\Tag;
use PDO;

class TagDAO extends GenericDAO{

    private static $Db;

    public function __construct()
    {
        
    }

    public function getCourTags(int $cour_id)
    {
        $Db = Database::getInstance()->getConnection();
        $query = "SELECT DISTINCT tags.* FROM Tags, cours_tags WHERE cours_tags.tag_id = tags.id AND cours_tags.cour_id = {$cour_id};"; 
        $statement = $Db->prepare($query);
        $statement->execute();
        $tags = $statement->fetchAll(PDO::FETCH_CLASS, $this->getClass());

        return $tags; 
    }

    public function TableName(): string{
        return "tags";
    }

    public function getAttributes(): array{
        return ['id', 'nom', 'description'];
    }

    public function getClass(){
        return Tag::class;
    }
}

