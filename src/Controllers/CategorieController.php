<?php

namespace App\Controllers;

use App\Services\CategorieService;

class CategorieController{
 
    private CategorieService $CategorieService;

    public function __construct()
    {
        $this->CategorieService = new CategorieService();
    }

    public function getAll(){
        $categories = $this->CategorieService->getAll();
        return $categories;
    }

    public function Delete($categorie_id){
        return $this->CategorieService->Delete($categorie_id);
    }

    public function getNumberOf(){
        return $this->CategorieService->getNumberOf();
    }

    public function findOneBy($field, $value){
        return $this->CategorieService->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->CategorieService->Update($Object);
    }
}
