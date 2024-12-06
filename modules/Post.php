<?php
class Post{
    protected $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function postRecipes(){
        return "This is some recipes that are added.";
    }

    public function postIngredients(){
        return "This is some ingredients that are added.";
    }
}
?>