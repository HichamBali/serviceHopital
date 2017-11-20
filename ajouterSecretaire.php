<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 20/11/2017
 * Time: 14:09
 */
$nom = $_POST['nom_s'];
$prenom = $_POST['prenom_s'];
$numTel = $_POST['numTel_s'];
$niveau = $_POST['niveau_s'];
$adresse = $_POST['adresse_s'];
try{
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
    $insert = $connexionDB->query("INSERT INTO secretaire(nom_s,prenom_s,numTel_s,niveau_s,adresse_s)
      VALUES ('" . $nom . "','" . $prenom . "','" . $numTel . "','" . $niveau . "','" . $adresse . "')");

    header("location:listeSecretaire.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
