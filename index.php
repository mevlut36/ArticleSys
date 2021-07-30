<?php
    include("class/Article.php");
    $article = new Article;

    if(isset($_POST["title"], $_POST["desc"]) && !empty($_POST["title"]) && !empty($_POST["desc"])){
        $title = htmlspecialchars(addslashes($_POST["title"]));
        $desc = htmlspecialchars(addslashes($_POST["desc"]));
        $article->addArticle($title, $desc);
    }
?>
<html>
<head>
    <title>Article system</title>
</head>
<body style="background-color:rgb(57,57,57);">

    <form action="index.php" method="post">
        <input type="text" name="title" placeholder="Titre"><br><br>
        <input type="text" name="desc" placeholder="Texte">
        <input type="submit">
    </form>

    <?php
        $sql = "SELECT id, title from article ORDER BY id";
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $request = $db->query($sql);
        while($row = $request->fetch()){
    ?>
    <li><a href="search.php?id=<?= $row["id"] ?>"><?= stripslashes($row["title"]) ?></a> <strong> | <a href="edit.php?edit=<?= $row['id'] ?>">Modifier</a> | <a href="class/delete.php?id=<?= $row['id'] ?>">Supprimer</a></li>
    <?php } ?>
</body>
</html>