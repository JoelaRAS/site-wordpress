<?php
    //Requête de suppression
    include('db.inc.php');
    $tache_id=$_GET['$tache_id'];
    $delete=$mysqli->query(' DELETE FROM `taches` WHERE `id`="'.$tache_id.'"');
    header('Location:index.php');