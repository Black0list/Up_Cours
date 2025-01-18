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

    public function getNumberOf(){
        return $this->CourService->getNumberOf();
    }

}

?>