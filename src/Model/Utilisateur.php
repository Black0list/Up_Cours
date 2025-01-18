<?php

namespace App\Model;

class Utilisateur{
    protected int $id = 0;
    protected String $name;
    protected String $email = '';
    protected String $password = '';
    protected Role $role;
    protected String $status = '';
    // protected array $list = [];

    // public function __construct($id, $name, $email, $password, $role, $status) {
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->role = $role;
    //     $this->status = $status;
    // }

    public function __construct()
    {
        $this->role = new Role;
    }

    public function __call($name, $arguments) {
        if ($name === "Build" && isset($arguments[0]) && is_array($arguments[0])) {
            $allowedAttributes = ['id', 'name', 'email', 'password', 'role', 'status'];
    
            foreach ($arguments[0] as $key => $value) {
                if (in_array($key, $allowedAttributes)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    public function getRoleName(){
        return $this->getRole()->getRoleName();
    }
    


    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }
    public function getStatus() { return $this->status; }


    public function setId($id) { $this->id = $id; }
    public function setName($name) { $this->name = $name; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setRole($role) { $this->role = $role; }
    public function setStatus($status) { $this->status = $status; }

    public function __toString()
    {
        return "id : {$this->getId()}, nom : {$this->getName()}, Email : {$this->getEmail()}, Password : {$this->getPassword()} Role : {$this->getRole()}, status : {$this->getStatus()}";
    }
}


// $user = new Utilisateur;
// $user->Build(1,"hadoui", "admin");
// echo $user;

