<?php

    include('db.inc.php');
    $tache_id=$_GET['$tache_id'];

    $tache=$mysqli->query('SELECT * FROM taches WHERE id="'.$tache_id.'"');
    $tache=$tache->fetch_assoc();

    if(isset($_POST['nom']) && isset($_POST['objectif']) && isset($_POST['atribution'])){
        $tache=$mysqli->prepare('UPDATE taches SET `nom`=?, `objectif`=?, `atribution`=? WHERE `id`=?');
        $tache->bind_param('sssi',$_POST['nom'],$_POST['objectif'],$_POST['atribution'],$tache_id );
        $tache->execute();
        header('Location:index.php');
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification de tâche</title>
</head>
<body>

    <div>
        <h4>Modifier une tâche :</h4>
        <form action="" method="post" class="form-example">
            <div class="form-example">
                <label for="nom">Entrez une tache : </label>
                <input type="text" name="nom" id="nom" value="<?= $tache['nom'] ?>" required>
            </div>
            <div class="form-example">
                <label for="objectif">decrivez l'objectif: </label>
                <textarea name="objectif" cols="30" rows="8" class="form-control" required><?= $tache['objectif'] ?></textarea>
            </div>
            <div class="form-example">
                <label for="atribution"> A qui atribuez-vous la tache : </label>
                <input type="text" name="atribution" value="<?= $tache['atribution'] ?>" id="atribution" required>
            </div>
            <button type="submit">Modifier la tâche</button>
        </form>
    </div>

</body>
</html>
