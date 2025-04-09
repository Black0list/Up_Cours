<?php

namespace App\Model;

class Cour
{
    private int $id;
    private string $title;
    private string $description;
    private string $content;
    private array $tags = [];
    private Categorie $categorie;
    private Utilisateur $enseignant;
    private array $InscriptedStudents = [];

    // public function __construct($id, $title, $description, $content, $tags, $category_id, $enseignant_id) {
    //     $this->id = $id;
    //     $this->title = $title;
    //     $this->description = $description;
    //     $this->content = $content;
    //     $this->tags = $tags;
    //     $this->category_id = $category_id;
    //     $this->enseignant_id = $enseignant_id;
    // }

    public function __construct()
    {
        $this->categorie = new Categorie;
    }

    public function __call($name, $arguments) {
        if ($name === "Build" && isset($arguments[0]) && is_array($arguments[0])) {
            $allowedAttributes = ['id', 'title', 'description', 'content', 'tags', 'categorie', 'enseignant', 'InscriptedStudents'];
    
            foreach ($arguments[0] as $key => $value) {
                if (in_array($key, $allowedAttributes)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    public function getAttributes(): array{
        return ['id', 'title', 'description', 'content', 'categorie_id', 'enseignant_id'];
    }


    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getContent() { return $this->content; }
    public function getTags() { return $this->tags; }
    public function getCategory() { return $this->categorie; }
    public function getEnseignant() { return $this->enseignant; }
    public function getInscriptedStudents() { return $this->InscriptedStudents; }


    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setContent($content) { $this->content = $content; }
    public function setTags($tags) { $this->tags = $tags; }
    public function setCategory($category_id) { $this->categorie = $category_id; }
    public function setEnseignant($enseignant_id) { $this->enseignant = $enseignant_id; }
    public function setInscriptedStudents($InscriptedStudents) { $this->InscriptedStudents = $InscriptedStudents; }


    public function __toString()
    {
        return "id : {$this->getId()}, title : {$this->getTitle()}, description : {$this->getDescription()}, Content : {$this->getContent()}, Tags : {$this->getTags()}, Categorie : {$this->getCategory()}, Enseignant : {$this->getEnseignant()}, Inscripted : ". implode(", ", $this->getInscriptedStudents()) .")}";
    }
}
