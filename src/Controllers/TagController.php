<?php

namespace App\Controllers;

use App\Services\TagService;

class TagController{
 
    private TagService $TagService;

    public function __construct()
    {
        $this->TagService = new TagService();
    }

    public function getAll(){
        $Tags = $this->TagService->getAll();
        return $Tags;
    }

    public function Delete($tag_id){
        return $this->TagService->Delete($tag_id);
    }

    public function getNumberOf(){
        return $this->TagService->getNumberOf();
    }
}
