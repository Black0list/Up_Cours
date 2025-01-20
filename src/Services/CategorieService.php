<?php

namespace App\Services;

use App\Repositories\CategorieRepository;

class CategorieService{

    private CategorieRepository $CategorieRepository;


    public function __construct()
    {
        $this->CategorieRepository = new CategorieRepository;
    }


    public function getAll() {
        return $this->CategorieRepository->getAll();
    }

    public function findOneBy($field, $value){
        return $this->CategorieRepository->findOneBy($field, $value);
    }

    public function Delete($categorie_id){
        return $this->CategorieRepository->Delete($categorie_id);
    }

    public function getNumberOf(){
        return $this->CategorieRepository->getNumberOf();
    }

    public function Update($Object){
        return $this->CategorieRepository->Update($Object);
    }
}