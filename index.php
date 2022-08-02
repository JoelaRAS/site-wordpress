<?php //Silence is golden
<link rel="stylesheet" href="style.css">
<?php

include("db.inc.php");

// Requête pour récuperer la liste de toutes les tâches 
$wp_frmt_form_entry_meta=$mysqli->query('SELECT * FROM wp_frmt_form_entry_meta ORDER BY created_at asc');
$wp_frmt_form_entry_meta=$wp_frmt_form_entry_meta->fetch_all();


if(isset($_POST['nom']) && isset($_POST['objectif']) && isset($_POST['atribution'])){
    $result=$mysqli->prepare("INSERT INTO `wp_frmt_form_entry_meta`(`nom`,`objectif`,`atribution`) VALUES (?,?,?)");
    $result->bind_param('sss',$_POST['nom'], $_POST['objectif'], $_POST['atribution']);
    $result->execute();
    header('Location:index.php');
}


if(isset($_POST['statut']) && isset($_POST['tache_id'])){
    $ticket=$mysqli->prepare("UPDATE `wp_frmt_form_entry_meta` SET  `statut`= ? WHERE `id`=? ");
    $ticket->bind_param('si',$_POST['statut'],$_POST['tache_id']);
    $ticket->execute();
    header('Location:index.php');
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TCS WORKFLOW</title>
</head>
<body>

<div class="container">
    <div>
        <table>
            <thead>
            <tr>
                <th colspan="8">TCS Services learning</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><b>tache</b></td>
                <td><b>objectif</b></td>
                <td><b>Statut</b></td>
                <td><b>atribution</b></td>
                <td><b>Créé le</b></td>
                <td><b>Etat du projet</b></td>
                <td><b>Modifier la tâche</b></td>
                <td><b>Supprimer la tâche</b></td>
            </tr>
            <?php   foreach ($wp_frmt_form_entry_meta as $tache) : ?>
                <tr style="text-align: center">
                    <td><a href="showTache.php?$tache_id=<?= $tache[0] ?>" style="text-decoration: none; color: black"> <?= $tache[1] ?></a></td>
                    <td><a href="showTache.php?$tache_id=<?= $tache[0] ?>" style="text-decoration: none; color: black"> <?= $tache[2] ?></a></td>
                    <td><a href="showTache.php?$tache_id=<?= $tache[0] ?>" style="text-decoration: none; color: black"> <?= $tache[3] ?></a></td>
                    <td><a href="showTache.php?$tache_id=<?= $tache[0] ?>" style="text-decoration: none; color: black"> <?= $tache[4] ?></a></td>
                    <td><a href="showTache.php?$tache_id=<?= $tache[0] ?>" style="text-decoration: none; color: black"> <?= $tache[5] ?></a></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="statut" value="Terminé"/>
                            <input type="hidden" name="tache_id" value="<?= $tache[0] ?>"/>
                            <button type="submit">Terminé</button>
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="statut" value="en cours"/>
                            <input type="hidden" name="tache_id" value="<?= $tache[0] ?>"/>
                            <button type="submit">en cours</button>
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="statut" value="soumis"/>
                            <input type="hidden" name="tache_id" value="<?= $tache[0] ?>"/>
                            <button type="submit">soumis</button>
                        </form>
                    </td>
                    <td>
                        <a href="modifTache.php?$tache_id=<?= $tache[0] ?>"><button>Modifier</button></a>
                    </td>
                    <td>
                        <a href="deleteTache.php?$tache_id=<?= $tache[0] ?>"><button>Supprimer</button></a>
                    </td>
                </tr>
            <?php endforeach;  ?>
            </tbody>
        </table>

        <hr>


    </div>
</div>

</body>
</html>