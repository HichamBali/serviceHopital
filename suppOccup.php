<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 22/01/2018
 * Time: 21:06
 */
session_start();


$ids=$_POST['ids'];



try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->prepare("DELETE FROM occupation WHERE idOCCUPATION=$ids ");
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

