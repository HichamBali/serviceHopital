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
$numTel = $_POST['numTel_i'];
$username = $_POST['user'];
$password = $_POST['password'];
$type = "secretaire";
try{
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $insertuser = $connexionDB->query("INSERT INTO users(username,password,typeUser) 
              VALUES ('".$username."','".$password."','".$type."')");
    $id = $connexionDB->lastInsertId();

    $insert = $connexionDB->query("INSERT INTO secretaire(nom_s, prenom_s, numTel_s, niveau_s ,adresse_s,idUser)
      VALUES ('" . $nom . "','" . $prenom . "','" . $numTel . "','" . $niveau . "','" . $adresse . "','".$id."')");

    header("location:listeSecretaire.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
