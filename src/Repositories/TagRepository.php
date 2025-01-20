<?php

namespace App\Repositories;

use App\DAOs\TagDAO;

class TagRepository{

    private TagDAO $TagDAO;

    public function __construct()
    {
        $this->TagDAO = new TagDAO;
    }

    public function getAll() {
        return $this->TagDAO->getAll();
    }

    public function Delete($tag_id){
        return $this->TagDAO->Delete($tag_id);
    }

    public function getNumberOf(){
        return $this->TagDAO->getNumberOf();
    }

    public function getCourTags($cour_id){
        return $this->TagDAO->getCourTags($cour_id);
    }

    public function findOneBy($field, $value){
        return $this->TagDAO->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->TagDAO->Update($Object);
    }
}