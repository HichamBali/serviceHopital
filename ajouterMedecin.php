<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 03/11/2017
 * Time: 17:12
 */

$nom = $_POST['nom_m'];
$prenom = $_POST['prenom_m'];
$adresse = $_POST['adresse_m'];
$grade = $_POST['grade_m'];
$specialite = $_POST['specialite_m'];
$numTel = $_POST['telephone_m'];
echo $nom;
try {
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
    $insert = $connexionDB->query("INSERT INTO medecin(nom_m,prenom_m,adresse_m,grade_m,specialite_m,numTel_m)
      VALUES ('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $grade . "','" . $specialite . "','" . $numTel . "')");

    header("location:listeMedecin.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

