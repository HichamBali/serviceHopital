<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/01/2018
 * Time: 14:49
 */

//ajouter consultation.
$rapport = $_POST['rapport'];
$ordonnance = $_POST['ordonnance'];
$certificat = $_POST['certificat'];
$orientation = $_POST['orientation'];
$ajouter = $_POST['ajouter'];

$idPATIENT = $_POST['id'];

echo "$idPATIENT";

try {
    //on insère d'abord ds la table occupation

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
    $insert = $connexionDB->query("INSERT INTO consultation(rapport, ordonnance, orientation, certificat, PATIENT_idPATIENT )
         VALUES ('" . $rapport . "','" . $ordonnance . "','" . $orientation . "','" . $certificat . "','" . $idPATIENT . "')");
    $connexionDB->exec($insert);


   // $last_id = $connexionDB->lastInsertId();

  /*  $insert = $connexionDB->query("INSERT INTO patient(nom_p, prenom_p, numSC, adresse_p, numTel_p, DateNaissance_p, DateRdv, idOccupation)
      VALUES ('" . $nom . "','" . $prenom . "','" . $numSC . "','" . $adresse . "','" . $numTel . "','" . $dateN . "','" . $dateR . "','" . $last_id . "')");
*/
    header("location:listePatient.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}