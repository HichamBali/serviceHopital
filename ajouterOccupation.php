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
$chambre = $_POST['chambre'];
$insertO = $_POST['insertO'];

if ($insertO == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $query = $connexionDB->query("INSERT INTO occupation(dateD, dateF, chambre, idPatient, idMedecin)
         VALUES ('" . $dateD . "','" . $dateF . "','" . $chambre . "','" . $idp . "','" . $med . "')");
        $connexionDB->exec($query);
        $up=$connexionDB->query("UPDATE chambre SET nbOccuped=nbOccuped+1 WHERE idCHAMBRE=$chambre");


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

        $decrement = $connexionDB->query("SELECT chambre FROM occupation WHERE idOCCUPATION = $idOCCUPATION");
        $var=$decrement->fetch(PDO::FETCH_ASSOC);
        $var = $var['chambre'];

        $dec = $connexionDB->query("UPDATE chambre SET nbOccuped = IF(nbOccuped > 0, nbOccuped-1, 0) WHERE idCHAMBRE=$var");
        $dec = $dec->execute();


        $query = "UPDATE occupation SET dateD=?, dateF=?, chambre=? WHERE idOCCUPATION=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($dateD, $dateF, $chambre, $idOCCUPATION));
        $up=$connexionDB->query("UPDATE chambre SET nbOccuped=nbOccuped+1 WHERE idCHAMBRE=$chambre");

        header("location:details.php?idp=$idp");

    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
