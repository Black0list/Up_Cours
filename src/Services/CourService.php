<?php

namespace App\Services;

use App\Repositories\CourRepository;

class CourService{
    private CourRepository $CourRepository;

    public function __construct()
    {
        $this->CourRepository = new CourRepository;
    }

    public function getAll(){
        return $this->CourRepository->getAll();
    }

    public function getNumberOf(){
        return $this->CourRepository->getNumberOf();
    }
}