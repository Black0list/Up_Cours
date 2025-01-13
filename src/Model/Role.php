<?php

namespace App\Model;

class Role{
    private int $id = 0;
    private String $role_name = '';
    private String $description = '';

    public function __construct()
    {
        
    }

    public function __call($name, $arguments) {
        if($name == "Build"){
            if(count($arguments) == 1){
                $this->id = $arguments[0];
            } 
            if(count($arguments) == 2){
                $this->id = $arguments[0];
                $this->role_name = $arguments[1];
            } 
            if(count($arguments) == 3){
                $this->id = $arguments[0];
                $this->role_name = $arguments[1];
                $this->description = $arguments[2];
            } 
        }
    }


    public function getId() { return $this->id; }
    public function getRoleName() { return $this->role_name; }
    public function getDescription() { return $this->description; }



    public function setId($id) { $this->id = $id; }
    public function setRoleName($role_name) { $this->role_name = $role_name; }
    public function setDescription($description) { $this->description = $description; }

    public function __toString()
    {
        return "id : {$this->getId()}, role_name : {$this->getRoleName()}, description : {$this->getDescription()}";
    }

}