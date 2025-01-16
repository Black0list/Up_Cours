<?php

namespace App\Model;

class Section
{
    private int $id;
    private String $nom;
    private String $description;


    public function __call($name, $arguments) {
        if ($name === "Build" && isset($arguments[0]) && is_array($arguments[0])) {
            $allowedAttributes = ['id', 'nom', 'description'];
    
            foreach ($arguments[0] as $key => $value) {
                if (in_array($key, $allowedAttributes)) {
                    $this->{$key} = $value;
                }
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

