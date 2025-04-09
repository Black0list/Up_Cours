<?php

namespace App\DAOs;

use App\Model\Categorie;

class CategorieDAO extends GenericDAO{

    public function __construct()
    {
        
    }


    public function TableName(): string{
        return "categories";
    }

    public function getAttributes(): array{
        return ['id', 'nom', 'description'];
    }

    public function getClass(){
        return Categorie::class;
    }
}