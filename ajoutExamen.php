<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 04/01/2018
 * Time: 17:16
 */
/*
if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
move_uploaded_file($_FILES['icone']['tmp_name'],'img/'.$_FILES['icone']['name']);

$icone = $_FILES['icone']['name'];
$icone = addslashes (file_get_contents($_FILES['icone']['tmp_name']));

*/

$dateExamen=$_POST['dateExamen'];
$typeE=$_POST['typeE'];
//$icone=$_POST['icone'];//image resultatExamen
$fichierExam=$_POST['fichierExam'];
$idPATIENT = $_POST['idPatient'];





try {

    $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

    $query = $connexionDB->query("INSERT INTO examen(dateExamen, typeE, resultatExamen, fichierExam,idPatient )
         VALUES ('" . $dateExamen . "','" . $typeE . "','" . $typeE . "','" . $fichierExam . "','".$idPATIENT."')");
    $connexionDB->exec($query);

    //le id Patient!

    header("location:listePatient.php");
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

