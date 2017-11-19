<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 03/11/2017
 * Time: 17:12
 */

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$grade = $_POST['grade'];
$specialite = $_POST['specialite'];
$numTel = $_POST['telephone'];
echo $nom;
try {
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
    $insert = $connexionDB->query("INSERT INTO medecin(nom_m,prenom_m,adresse_m,grade_m,specialite_m,numTel_m)
      VALUES ('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $grade . "','" . $specialite . "','" . $numTel . "')");
    $insert->execute();
    header("location:afficherMedecin.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

