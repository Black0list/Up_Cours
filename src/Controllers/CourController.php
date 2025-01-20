<?php

namespace App\Controllers;

use App\Model\Role;
use App\Services\CourService;
use Exception;

class CourController{
    private CourService $CourService;
    public function __construct()
    {
        $this->CourService =  new CourService();
    }

    public function getAll(){
        $cours = $this->CourService->getAll();
        return $cours;
    }

    
    public function getAllBy($field, $value){
        return $this->CourService->getAllBy($field, $value);
    }

    public function getNumberOf(){
        return $this->CourService->getNumberOf();
    }

    public function Delete($cour_id){
        return $this->CourService->Delete($cour_id);
    }

    public function findOneBy($field, $value){
        return $this->CourService->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->CourService->Update($Object);
    }

    public function Create($Object){
        return $this->CourService->Create($Object);
    }

}

?>