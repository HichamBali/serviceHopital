<?php

$nom = $_POST['nom_m'];
$prenom = $_POST['prenom_m'];
$adresse = $_POST['adresse_m'];
$grade = $_POST['grade_m'];
$specialite = $_POST['specialite_m'];
$numTel = $_POST['numTel_m'];
$username = $_POST['user'];
$password = $_POST['password'];
$type = "medecin";
$insert = $_POST['insert'];
// ajouter medecin
if ($insert == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $insert1 = $connexionDB->prepare("INSERT INTO users(username, password, typeUser)
      VALUES (?,?,?)");
        $insert1->execute(array($username,$password,$type));

        $idU=5;
        $insert2 = $connexionDB->query("INSERT INTO medecin(nom_m, prenom_m, adresse_m, grade_m, specialite_m, numTel_m,idUser)
      VALUES ('" . $nom . "','" . $prenom . "','" . $adresse . "','" . $grade . "','" . $specialite . "','" . $numTel . "','" . $idU . "')");

        header("location:listeMedecin.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
} // Modifier medecin
else {
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idMEDECIN = $_POST['id'];


        $query = "UPDATE medecin SET nom_m=?, prenom_m=?, adresse_m=? , grade_m=?, specialite_m=?, numTel_m=? WHERE idMEDECIN=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($nom, $prenom,  $adresse, $grade, $specialite, $numTel, $idMEDECIN));

        header("location:listeMedecin.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
