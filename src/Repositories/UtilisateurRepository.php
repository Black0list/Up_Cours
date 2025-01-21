<?php

namespace App\Repositories;

use App\Core\config\Database;
use App\DAOs\UtilisateurDAO;
use App\Model\Role;
use App\Model\Utilisateur;

class UtilisateurRepository
{

    private static $Db;
    private UtilisateurDAO $UtilisateurDAO;

    public function __construct()
    {
        $this->UtilisateurDAO = new UtilisateurDAO;
    }

    public function Create(Utilisateur $user)
    {
        return $this->UtilisateurDAO->Create($user);
    }

    public function getUserByEmailAndPassword(string $email, string $password)
    {
        $Db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM utilisateurs WHERE email = '{$email}' AND password = '{$password}'";
        $statement = $Db->prepare($query);
        $statement->execute();
        $userObj = $statement->fetchObject(Utilisateur::class);

        return $userObj;
    }

    public function getAll(){
        return $this->UtilisateurDAO->getAll();
    }

    public function findOneBy($field, $value){
        return $this->UtilisateurDAO->findOneBy($field, $value);
    }

    public function Delete($user_id){
        return $this->UtilisateurDAO->Delete($user_id);
    }

    public function getNumberOf(){
        return $this->UtilisateurDAO->getNumberOf();
    }

    public function getAllBy($field, $value){
        return $this->UtilisateurDAO->getAllBy($field, $value);
    }

    public function AcceptRequest($user_id){
        $Db = Database::getInstance()->getConnection();
        $query = "UPDATE utilisateurs SET status = 'active' WHERE id = $user_id";
        $statement = $Db->prepare($query);
        $statement->execute();
    }

    public function Update($Object){
        return $this->UtilisateurDAO->Update($Object);
    }

    public function Subscribe($cour_id, $etudiant_id){
        $this->UtilisateurDAO->Subscribe($cour_id, $etudiant_id);
    }

    public function getAllSubscriptions($user_id){
        return $this->UtilisateurDAO->getAllSubscriptions($user_id);
    }

}