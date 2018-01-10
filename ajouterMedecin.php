<?php

$nom = $_POST['nom_m'];
$prenom = $_POST['prenom_m'];
$adresse = $_POST['adresse_m'];
$grade = $_POST['grade_m'];
$specialite = $_POST['specialite_m'];
$numTel = $_POST['numTel_m'];
$username = $_POST['user'];
$password = $_POST['password'];
$type = "medecin";
try {
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $insertuser = $connexionDB->query("INSERT INTO users(username,password,typeUser) 
              VALUES ('".$username."','".$password."','".$type."')");
    $id = $connexionDB->lastInsertId();
    /*$Urecupe = $connexionDB->query("SELECT idUser FROM users WHERE username = '".$_POST['user']."'");
    $result = $Urecupe->execute();*/


    $insert = $connexionDB->query("INSERT INTO medecin(nom_m,prenom_m,adresse_m,grade_m,specialite_m,numTel_m,idUser)
      VALUES ('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $grade . "','" . $specialite . "','" . $numTel . "','".$id."')");

    header("location:listeMedecin.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
