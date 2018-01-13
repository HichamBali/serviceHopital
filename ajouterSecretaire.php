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
$numTel = $_POST['numTel_s'];

$username = $_POST['user'];
$password = $_POST['password'];
$type = "secretaire";

$insert = $_POST['insert'];

if ($insert == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $insert = $connexionDB->query("INSERT INTO secretaire(nom_s, prenom_s, numTel_s, niveau_s, adresse_s)
      VALUES ('" . $nom . "','" . $prenom . "','" . $numTel . "','" . $niveau . "','" . $adresse . "')");

        header("location:listeSecretaire.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
} // Modifier medecin
else {
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idSECRETAIRE = $_POST['id'];


        $query = "UPDATE secretaire SET nom_s=?, prenom_s=?, numTel_s=? , niveau_s=?, adresse_s=? WHERE idSECRETAIRE=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($nom, $prenom,  $numTel, $niveau, $adresse, $idSECRETAIRE));

        header("location:listeSecretaire.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
