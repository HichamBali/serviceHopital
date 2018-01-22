<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 06/01/2018
 * Time: 20:36
 */
session_start();

$med=1;
$idp=$_SESSION['idp'];

$dateD = $_POST['dateD'];
$dateF = $_POST['dateF'];
$lit = $_POST['lit'];
$insertO = $_POST['insertO'];

if ($insertO == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $query = $connexionDB->query("INSERT INTO occupation(dateD, dateF, lit, idPatient, idMedecin)
         VALUES ('" . $dateD . "','" . $dateF . "','" . $lit . "','" . $idp . "','" . $med . "')");
        $connexionDB->exec($query);


        header("location:details.php?idp=$idp");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
else{
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idOCCUPATION = $_POST['id'];


        $query = "UPDATE occupation SET dateD=?, dateF=?, lit=? WHERE idOCCUPATION=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($dateD, $dateF, $lit, $idOCCUPATION));

        header("location:details.php?idp=$idp");

    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
