<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 22/01/2018
 * Time: 00:21
 */


session_start();

$ids=$_POST['ids'];



try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->prepare("DELETE FROM examen WHERE idEXAMEN=$ids ");
    if($query->execute())
    {
        echo "success";
    }
    else echo "eroor";

} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

