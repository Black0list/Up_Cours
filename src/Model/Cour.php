<?php

namespace App\Model;

class Cour
{
    private $id;
    private $title;
    private $description;
    private $content;
    private $tags = [];
    private $category_id;
    private $enseignant_id;
    private $enrolledStudents = [];

    public function __construct($id, $title, $description, $content, $tags, $category_id, $enseignant_id) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->tags = $tags;
        $this->category_id = $category_id;
        $this->enseignant_id = $enseignant_id;
    }


    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getContent() { return $this->content; }
    public function getTags() { return $this->tags; }
    public function getCategory() { return $this->category_id; }
    public function getEnseignant() { return $this->enseignant_id; }
    public function getEnrolledStudents() { return $this->enrolledStudents; }


    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setContent($content) { $this->content = $content; }
    public function setTags($tags) { $this->tags = $tags; }
    public function setCategory($category_id) { $this->category_id = $category_id; }
    public function setEnseignant($enseignant_id) { $this->enseignant_id = $enseignant_id; }
}
