<?php


$nom = $_POST['nom_p'];
$prenom = $_POST['prenom_p'];
$numSC = $_POST['numSC'];
$adresse = $_POST['adresse_p'];
$numTel = $_POST['numTel_p'];
$dateN = $_POST['DateNaissance_p'];
$dateR = $_POST['DateRdv'];
$insert = $_POST['insert'];
// si c'est valider on ajoute si non on modifie
if ($insert == 'Valider') {

    try {

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

      $insert = $connexionDB->query("INSERT INTO patient(nom_p, prenom_p, numSC, adresse_p, numTel_p, DateNaissance_p, DateRdv)
      VALUES ('" . $nom . "','" . $prenom . "','" . $numSC . "','" . $adresse . "','" . $numTel . "','" . $dateN . "','" . $dateR . "')");

        header("location:listePatient.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
} // Modifier patient
else {
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        $idPATIENT = $_POST['id'];


        $query = "UPDATE patient SET nom_p=?, prenom_p=?, numSC=? , adresse_p=?, numTel_p=?, DateNaissance_p=?,DateRdv=? WHERE idPATIENT=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($nom, $prenom, $numSC, $adresse, $numTel, $dateN, $dateR, $idPATIENT));

        header("location:listePatient.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
