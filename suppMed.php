<?php
session_start();





$ids=$_POST['ids'];



try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->prepare("DELETE FROM medecin WHERE idMEDECIN=$ids ");
    if($query->execute())
    {
        echo "success";
    }
    else echo "eroor";
    //le id Medecin!


} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}



?>