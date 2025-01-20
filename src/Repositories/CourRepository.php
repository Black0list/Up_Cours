<?php

namespace App\Repositories;

use App\DAOs\CourDAO;

class CourRepository{

    private CourDAO $CourDAO;

    public function __construct()
    {
        $this->CourDAO = new CourDAO;
    }

    public function getAll(){
        return $this->CourDAO->getAll();
    }

    public function getAllBy($field, $value){
        return $this->CourDAO->getAllBy($field, $value);
    }

    public function getNumberOf(){
        return $this->CourDAO->getNumberOf();
    }

    public function Delete($cour_id){
        return $this->CourDAO->Delete($cour_id);
    }

    public function findOneBy($field, $value){
        return $this->CourDAO->findOneBy($field, $value);
    }
    public function Create($Object){
        return $this->CourDAO->Create($Object);
    }
    public function Update($Object){
        return $this->CourDAO->Update($Object);
    }
}