<?php
session_start();





$ids=$_POST['ids'];



try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->prepare("DELETE FROM consultation WHERE idCONSULTATION=$ids ");
    if($query->execute())
    {
        echo "success";
    }
    else echo "eroor";
    //le id Patient!

    
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}



?>