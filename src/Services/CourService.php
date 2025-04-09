<?php

namespace App\Services;

use App\Model\Categorie;
use App\Model\Enseignant;
use App\Model\Utilisateur;
use App\Repositories\CourRepository;

class CourService{
    private CourRepository $CourRepository;
    private UtilisateurService $UtilisateurService;
    private CategorieService $CategorieService;
    private TagService $TagService;

    public function __construct()
    {
        $this->CourRepository = new CourRepository;
        $this->UtilisateurService = new UtilisateurService;
        $this->CategorieService = new CategorieService;
        $this->TagService = new TagService;
    }

    public function getAll(){
        $cours = $this->CourRepository->getAll();

        // $enseignant = new Enseignant;
        // $enseignant->Build(["name" => "no Author"]);

        // $categorie = new Categorie;
        // $categorie->Build(["nom" => "no categorie"]);

        

        foreach($cours as $value){
            if (!is_null($value->categorie_id)) {
                $categorie = $this->CategorieService->findOneBy("id", $value->categorie_id);
            } else {
                $categorie = new Categorie;
            } 
            
            if(!is_null($value->enseignant_id)){
                $enseignant = $this->UtilisateurService->findOneBy("id", $value->enseignant_id);
            } else {
                $enseignant = new Utilisateur;
            }
    
            $value->setEnseignant($enseignant);
            $value->setCategory($categorie);

            $tags = $this->TagService->getCourTags($value->getId());
            $value->setTags($tags);

        }

        return $cours;
    }

    public function getAllBy($field, $value){
        $cours = $this->CourRepository->getAllBy($field, $value);        

        foreach($cours as $value){
            if (!is_null($value->categorie_id)) {
                $categorie = $this->CategorieService->findOneBy("id", $value->categorie_id);
            } else {
                $categorie = new Categorie;
            } 
            
            if(!is_null($value->enseignant_id)){
                $enseignant = $this->UtilisateurService->findOneBy("id", $value->enseignant_id);
            } else {
                $enseignant = new Utilisateur;
            }
    
            $value->setEnseignant($enseignant);
            $value->setCategory($categorie);

            $tags = $this->TagService->getCourTags($value->getId());
            $value->setTags($tags);

        }

        return $cours;
    }

    public function getNumberOf(){
        return $this->CourRepository->getNumberOf();
    }

    public function Delete($cour_id){
        return $this->CourRepository->Delete($cour_id);
    }

    public function findOneBy($field, $value){
        $cour = $this->CourRepository->findOneBy($field, $value);

        if (!is_null($cour->categorie_id)) {
            $categorie = $this->CategorieService->findOneBy("id", $cour->categorie_id);
        } else {
            $categorie = new Categorie;
        } 
        
        if(!is_null($cour->enseignant_id)){
            $enseignant = $this->UtilisateurService->findOneBy("id", $cour->enseignant_id);
        } else {
            $enseignant = new Utilisateur;
        }

        $cour->setEnseignant($enseignant);
        $cour->setCategory($categorie);
        $tags = $this->TagService->getCourTags($cour->getId());
        $cour->setTags($tags);

        return $cour;
    }

    public function Update($Object){
        return $this->CourRepository->Update($Object);
    }

    public function Create($Object){
        return $this->CourRepository->Create($Object);
    }


}