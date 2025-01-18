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
}
