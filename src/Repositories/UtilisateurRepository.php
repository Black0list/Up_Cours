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
}