<?php

namespace App\Repositories;

use App\DAOs\CategorieDAO;
use App\Model\Categorie;

class CategorieRepository{

    private CategorieDAO $CategorieDAO;

    public function __construct()
    {
        $this->CategorieDAO = new CategorieDAO;
    }

    public function getAll() {
        return $this->CategorieDAO->getAll();
    }

    public function findOneBy($field, $value){
        return $this->CategorieDAO->findOneBy($field, $value);
    }

    public function Delete($categorie_id){
        return $this->CategorieDAO->Delete($categorie_id);
    }

    public function getNumberOf(){
        return $this->CategorieDAO->getNumberOf();
    }

    public function Update($Object){
        return $this->CategorieDAO->Update($Object);
    }

    public function Create($Object){
        return $this->CategorieDAO->Create($Object);
    }
}