<?php
$bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
	$suppr_id = htmlspecialchars($_GET['id']);
	$suppr = $bdd->prepare('DELETE FROM article WHERE id = ?');
	$suppr->execute(array($suppr_id));
	header('Location: /Article/index.php');

    echo "Article deleted.";
}
?>