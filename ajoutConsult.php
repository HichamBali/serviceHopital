<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/01/2018
 * Time: 14:49
 */

//ajouter consultation.
$med=1;
$idp=$_SESSION['idp'];
$rapport = $_POST['rapprot'];
$ordonnance = $_POST['ordonnace'];
$certificat = $_POST['certifcat'];
$orientation = $_POST['oridentation'];
$dateCons = $_POST['dateCons'];






try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->prepare("INSERT INTO consultation(rapport, ordonnance, orientation, certificat, dateCons, idPatient,idMedecin)
         VALUES (:rapport ,:ordonnance, :orientation, :certificat , :dateCons,:idPatient,:idMedecin)");
    $query->bindParam(':rapport', $rapport);
    $query->bindParam(':ordonnance', $ordonnance);
    $query->bindParam(':orientation', $orientation);
    $query->bindParam(':certificat', $certificat);
    $query->bindParam(':dateCons', $dateCons);
    $query->bindParam(':idPatient', $idp);
    $query->bindParam(':idMedecin', $med);
    if($query->execute())
    {
        echo "success";
    }
    else echo "eroor";
    //le id Patient!

    
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}



?>
