<?php

namespace App\Controllers;

use App\Model\Utilisateur;
use App\Services\UtilisateurService;

class UtilisateurController{

    private UtilisateurService $UtilisateurService;
    public function __construct()
    {
        $this->UtilisateurService = new UtilisateurService;
    }

    public function getAll(){
        return $this->UtilisateurService->getAll();
    }

    public function Delete($user_id){
        return $this->UtilisateurService->Delete($user_id);
    }

    public function getNumberOf(){
        return $this->UtilisateurService->getNumberOf();
    }

    public function getAllBy($field, $value){
        return $this->UtilisateurService->getAllBy($field, $value);
    }

    public function AcceptRequest($user_id){
        $this->UtilisateurService->AcceptRequest($user_id);
    }

    // public function DenyRequest($user_id){
    //     $this->UtilisateurService->DenyRequest($user_id);
    // }

    public function findOneBy($field, $value){
        return $this->UtilisateurService->findOneBy($field, $value);
    }

    public function Update($Object){
        return $this->UtilisateurService->Update($Object);
    }

}