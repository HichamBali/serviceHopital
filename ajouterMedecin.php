

<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 03/11/2017
 * Time: 17:12
 */

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$grade=$_POST['grade'];
$specialite=$_POST['specialite'];
$numTel=$_POST['telephone'];
try {
    //connexion à la base de donnée
    $connexionDB = new PDO("mysql:host=localhost;dbname=service", "root", "");
    $connexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert = $connexionDB->prepare("INSERT INTO medecin(nom_m,prenom_m,adresse_m,grade_m,specialite_m,numTel_m)
      VALUES (:nom_medecin,:prenom_medecin,:adresse_medecin,:grade_medecin,:specialite_medecin,:numTel_medecin)");
    $insert->bindParam(':nom_medecin',$nom);
    $insert->bindParam(':prenom_medecin',$prenom);
    $insert->bindParam(':adresse_medecin',$adresse);
    $insert->bindParam(':agrade_medecin',$grade);
    $insert->bindParam(':specialite_medecin',$specialite);
    $insert->bindParam(':numTel_medecin',$numTel);
    echo "Connected successfully";
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
