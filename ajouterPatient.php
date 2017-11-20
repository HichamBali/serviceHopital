<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 20/11/2017
 * Time: 14:09
 */
$nom = $_POST['nom_p'];
$prenom = $_POST['prenom_p'];
$adresse = $_POST['adresse_p'];
$grade = $_POST['grade_p'];
$specialite = $_POST['specialite_p'];
$numTel = $_POST['telephone_p'];
echo $nom;
try {
    //connexion à la base de donnée
    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
}
catch (PDOException $e){
    die("Erreur: " . $e->getMessage());
}

