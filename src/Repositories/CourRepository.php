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

    public function getNumberOf(){
        return $this->CourDAO->getNumberOf();
    }
}