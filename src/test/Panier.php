<?php

namespace App\test;


class Panier{

    private array $articles = [];

    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    public function addArticle($article){
        array_push($this->articles, $article);
    }

    public function removeArticle($article){
        array_splice($this->articles, $article);
    }

    public function DisplayArticles(){
        return $this->articles;
    }

}

$articles = ["prod1", "prod2"];
$pan = new Panier($articles);
var_dump($pan->DisplayArticles());