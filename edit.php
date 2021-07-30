<?php
    include("class/Article.php");
    $article = new Article;

    if(isset($_POST["title"], $_POST["desc"]) && !empty($_POST["title"]) && !empty($_POST["desc"])){
        $title = htmlspecialchars(addslashes($_POST["title"]));
        $desc = htmlspecialchars(addslashes($_POST["desc"]));
        $article->editArticle($id, $title, $desc);
    }
?>

<html>
<head>
    <title>Article system - Edit</title>
</head>
<body style="background-color:rgb(57,57,57);">

    <form action="edit.php" method="post">
        <input type="text" name="title" placeholder="Titre"><br><br>
        <input type="text" name="desc" placeholder="Texte">
        <input type="submit">
    </form>
    
</body>
</html>