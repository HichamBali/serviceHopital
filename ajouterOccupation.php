<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 06/01/2018
 * Time: 20:36
 */


$debut = $_POST['dateD'];
$fin = $_POST['dateF'];
$lit = $_POST['lit'];
$ajouterO = $_POST['ajouterO'];

$idPATIENT = $_POST['id'];


try {
    //on insère d'abord ds la table consultation

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->query("INSERT INTO occupation(dateD, dateF, lit, idPatient )
         VALUES ('" . $debut . "','" . $fin . "','" . $lit . "','" . $idPATIENT . "')");
    $connexionDB->exec($query);

    //le id Patient!

    header("location:listePatient.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

