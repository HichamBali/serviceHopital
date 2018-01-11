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
$numTel = $_POST['numTel_i'];
$username = $_POST['user'];
$password = $_POST['password'];
$type = "infirmier";
try {

    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $insertuser = $connexionDB->query("INSERT INTO users(username,password,typeUser) 
              VALUES ('".$username."','".$password."','".$type."')");
    $id = $connexionDB->lastInsertId();

    $insert = $connexionDB->query("INSERT INTO infirmier(nom_i,prenom_i,specialite_i,numTel_i,adresse_i,idUser)
            VALUES ('" . $nom . "','" . $prenom . "','" . $specialite . "','" . $numTel . "','".$adresse."','".$id."')");

    header("location:listeInfirmier.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

