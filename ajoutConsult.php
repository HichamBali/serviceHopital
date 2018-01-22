<?php

session_start();

$med=1;
$idp=$_SESSION['idp'];

$rapport = $_POST['rapport'];
$ordonnance = $_POST['ordonnance'];
$certificat = $_POST['certificat'];
$orientation = $_POST['orientation'];
$dateCons = $_POST['dateCons'];
$insert = $_POST['insert'];



// si c'est valider on ajoute si non on modifie
if ($insert == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $insert = $connexionDB->query("INSERT INTO consultation(rapport, ordonnance, orientation, certificat, dateCons, idPatient,idMedecin)

      VALUES ('" . $rapport . "','" . $ordonnance . "','" . $certificat . "','" . $orientation . "','" . $dateCons . "','" . $idp . "','" . $med . "')");


        header("location:test.php?idp=$idp");

    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}

else {
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idCONSULTATION = $_POST['id'];


        $query = "UPDATE consultation SET rapport=?, ordonnance=?, orientation=?, certificat=?, dateCons=? WHERE idCONSULTATION=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($rapport, $ordonnance, $orientation, $certificat, $dateCons, $idCONSULTATION));

      header("location:test.php?idp=$idp");

    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
















/*
session_start();


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

*/

