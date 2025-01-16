<?php

namespace App\DAOs;

use App\Core\config\Database;
use App\Model\Role;

abstract class GenericDAO{

    private static $Db;

    public function __construct()
    {
        
    }

    abstract public function TableName(): string;

    public function Create($object)
    {  

        $columns = $this->getAttributes();
        $values = [];
    
            
        foreach ((array)$object as $key => $value) {
            if(gettype($value) == "string"){
                array_push($values, "'{$value}'");
            } else if(gettype($value) == "object") {
                array_push($values, $value->getId());
            } else {
                array_push($values, $value);
            }
        }

        $Db = Database::getInstance()->getConnection();
        $query = "INSERT INTO {$this->TableName()} " . "(" . implode(', ', $columns) . ")" ." VALUES(". implode(', ', $values) .");";
        $stmt = $Db->prepare($query);  
        $stmt->execute();

        $object->setId($Db->lastInsertId());

        return $object;
    }

    public function Update($object)
    {

        $columns = $this->getAttributes();
        $values = [];
    
            
        foreach ((array)$object as $key => $value){
            if(gettype($value) == "string"){
                array_push($values, "'{$value}'");
            } else if(gettype($value) == "object") {
                array_push($values, $value->getId());
            } else {
                array_push($values, $value);
            }
        }

        $Db = Database::getInstance()->getConnection();
        $new_array = array_combine($columns, $values);


        $query_parts = [];

        foreach ($new_array as $key => $value) 
        {
            if($key != "id")
            {
                $query_parts[] = $key . " = " . $value;
            }
        }
        $fields= implode(", ", $query_parts);


        $query = "UPDATE {$this->TableName()} SET " . $fields . " WHERE id = {$new_array['id']}";
        $stmt = $Db->prepare($query);  
        $stmt->execute();

        var_dump($object);
        
        // return $object;
    }

    public function RemoveSpecialC($KeyWord)
    {
        return preg_replace('/[^A-Za-z0-9\-]/', '', $KeyWord);
    }

    abstract public function getAttributes(): array;
}