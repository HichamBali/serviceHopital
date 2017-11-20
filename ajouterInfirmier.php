<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 20/11/2017
 * Time: 14:09
 */


$nom = $_POST['nom_i'];
$prenom = $_POST['prenom_i'];
$specialite = $_POST['specialite_i'];
$adresse = $_POST['adresse_i'];
$numTel = $_POST['telephone_i'];
try {
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
    $insert = $connexionDB->query("INSERT INTO infirmier(nom_i,prenom_i,specialite_i,numTel_i,adresse_i)
      VALUES ('" . $nom . "','" . $prenom . "','" . $specialite . "','" . $numTel . "','".$adresse."')");

    header("location:listeInfirmier.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

