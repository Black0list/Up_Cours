<?php

namespace App\Model;

class Section
{
    private int $id;
    private String $nom;
    private String $description;


    public function __call($name, $arguments) {
        if($name == "Build"){
            if(count($arguments) == 1){
                $this->$arguments[0] = $arguments[0];
            } 

            if(count($arguments) == 2){
                $this->id = $arguments[0];
                $this->nom = $arguments[1];
            } 

            if(count($arguments) == 3){
                $this->id = $arguments[0];
                $this->nom = $arguments[1];
                $this->description = $arguments[2];
            } 
        }
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->nom; }
    public function getDescription() { return $this->description; }


    public function setId($id) { $this->id = $id; }
    public function setName($nom) { $this->nom = $nom; }
    public function setDescription($description) { $this->description = $description; }

}

