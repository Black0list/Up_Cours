<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService{

    private TagRepository $TagRepository;


    public function __construct()
    {
        $this->TagRepository = new TagRepository;
    }


    public function getAll() {
        return $this->TagRepository->getAll();
    }

    public function Delete($tag_id){
        return $this->TagRepository->Delete($tag_id);
    }

    public function getNumberOf(){
        return $this->TagRepository->getNumberOf();
    }

    public function getCourTags($cour_id){
       return  $this->TagRepository->getCourTags($cour_id);
    }

    public function findOneBy($field, $value){
        return $this->TagRepository->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->TagRepository->Update($Object);
    }

    public function Create($Object){
        return $this->TagRepository->Create($Object);
    }
}