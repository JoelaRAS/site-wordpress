<?php
    include('db.inc.php');
    $tache_id=$_GET['$tache_id'];

    $tache=$mysqli->query('SELECT * FROM taches WHERE id="'.$tache_id.'"');
    $tache=$tache->fetch_assoc();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tâche</title>
</head>
<body>

    <h3>nom : <?= $tache['nom'] ?></h3>
    <h3>objectif : <?= $tache['objectif'] ?></h3>
    <h3>atribution : <?= $tache['atribution'] ?></h3>
    <h3>Created_at : <?= $tache['created_at'] ?></h3>

    <a href="index.php">Retour au menu</a>

</body>
</html>
