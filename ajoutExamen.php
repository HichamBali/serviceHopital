<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 04/01/2018
 * Time: 17:16
 */

session_start();
/*
if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
move_uploaded_file($_FILES['icone']['tmp_name'],'img/'.$_FILES['icone']['name']);

$iconee = $_FILES['icone']['name'];
$iconee = addslashes (file_get_contents($_FILES['icone']['tmp_name']));


*/
$med=1;
$idp=$_SESSION['idp'];
$dateExamen = $_POST['dateExamen'];
$typeE = $_POST['typeE'];
$resultatExamen = $_POST['resultatExamen'];
$fichierExam = $_POST['fichierExam'];

$insertE = $_POST['insertE'];


if ($insertE == 'Valider') {


    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $query = $connexionDB->query("INSERT INTO examen(dateExamen, typeE, resultatExamen, fichierExam, idPatient)
         VALUES ('" . $dateExamen . "','" . $typeE . "','" . $resultatExamen . "','" . $fichierExam . "','" . $idp . "')");
        $connexionDB->exec($query);

        //le id Patient!

        header("location:details.php?idp=$idp");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }

} else{

    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idEXAMEN = $_POST['id'];


        $query = "UPDATE examen SET dateExamen=?, typeE=?, resultatExamen=?, fichierExam=? WHERE idEXAMEN=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($dateExamen, $typeE, $resultatExamen, $fichierExam, $idEXAMEN));

        header("location:details.php?idp=$idp");

    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}

