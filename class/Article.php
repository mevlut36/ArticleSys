<?php

class Article {
    private $title;
    private $desc;

    public $mode_edition = 0;

    public function getTitle(string $title){
        echo "<b>" . $title . "</b><br>";
    }

    public function getDesc(string $desc){
        echo $desc;
    }

    public function addArticle(string $title, string $desc){
        $sql = "SELECT id, title, descriptionn from article ORDER BY id";

        if(isset($_POST["title"], $_POST["desc"]) && !empty($_POST["title"]) && !empty($_POST["desc"])){
            $sql = "INSERT INTO article (title, descriptionn) VALUES (:title, :descriptionn)";
            $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $request = $db->prepare($sql);
            $request->bindParam(':title', $title);
            $request->bindParam(':descriptionn', $desc);
            $request->execute();
        }else{
            echo "Argument manquant(s).";
        }
    }

    public function getArticle(int $id){
        if(isset($id)){
            $sql = "SELECT id, title, descriptionn from article WHERE id = $id";
            $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $request = $db->prepare($sql);
            $request = $db->query($sql);
            $art = $request->fetch();

            $this->getTitle($art["title"]);
            $this->getDesc($art["descriptionn"]);
        } else {
            echo "error no int";
        }
        
    }

    public function editArticle(int $id, string $title, string $desc){
        if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
            $mode_edition = 1;
            $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        }
        if(isset($_POST["title"], $_POST["desc"]) && !empty($_POST["title"]) && !empty($_POST["desc"])){
            $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $update = $db->prepare("UPDATE article SET title $title, descriptionn $desc");
            $update->execute(array());
        }
    }

}