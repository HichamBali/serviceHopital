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

$insert = $_POST['insert'];

if ($insert == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $insert = $connexionDB->query("INSERT INTO infirmier(nom_i, prenom_i, adresse_i, numTel_i,specialite_i)
      VALUES ('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $numTel . "','" . $specialite . "')");

        header("location:listeInfirmier.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
} // Modifier infirmier
else {
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idINFIRMIER = $_POST['id'];


        $query = "UPDATE infirmier SET nom_i=?, prenom_i=?, adresse_i=? , numTel_i=?, specialite_i=? WHERE idINFIRMIER=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($nom, $prenom,  $adresse, $numTel, $specialite,  $idINFIRMIER));

        header("location:listeInfirmier.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
