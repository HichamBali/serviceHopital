<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 06/01/2018
 * Time: 20:36
 */


$dateD = $_POST['dateD'];
$dateF = $_POST['dateF'];
$lit = $_POST['lit'];

$ajouterO = $_POST['ajouterO'];

$idPATIENT = $_POST['id'];
/*
var_dump($idPATIENT);
var_dump($lit);

*/
try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->query("INSERT INTO occupation(dateD, dateF, lit, idPatient )
         VALUES ('" . $dateD . "','" . $dateF . "','" . $lit . "','" . $idPATIENT . "')");
    $connexionDB->exec($query);

    //le id Patient!

  header("location:listePatient.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

