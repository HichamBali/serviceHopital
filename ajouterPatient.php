<?php

$debut = $_POST['dateD'];
$fin = $_POST['dateF'];
$nlit = $_POST['lit'];

$nom = $_POST['nom_p'];
$prenom = $_POST['prenom_p'];
$numSC = $_POST['numSC'];
$adresse = $_POST['adresse_p'];
$numTel = $_POST['numTel_p'];
$dateN = $_POST['DateNaissance_p'];
$dateR = $_POST['DateRdv'];
$insert = $_POST['insert'];

if ($insert == 'Valider') {

    try {
        //on insère d'abord ds la table occupation

        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');
        $insert = $connexionDB->query("INSERT INTO occupation(dateD, dateF, lit)
         VALUES ('" . $debut . "','" . $fin . "','" . $nlit . "')");
        $connexionDB->exec($insert);

        //pour faire la jointure on récupère le idOccupation = last id

        $last_id = $connexionDB->lastInsertId();

        $insert = $connexionDB->query("INSERT INTO patient(nom_p, prenom_p, numSC, adresse_p, numTel_p, DateNaissance_p, DateRdv, idOccupation)
      VALUES ('" . $nom . "','" . $prenom . "','" . $numSC . "','" . $adresse . "','" . $numTel . "','" . $dateN . "','" . $dateR . "','" . $last_id . "')");


        header("location:listePatient.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
} // Modifier
else {
    try {
        $connexionDB = new PDO('mysql:host=localhost;dbname=service', 'root', '');

        //id je le récupère

        $idPATIENT = $_POST['id'];

        $query = "SELECT idOccupation FROM patient WHERE idPATIENT=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($idPATIENT));

        $id_occupation = $query->fetchColumn();

        if(empty($id_occupation)){


            $insert = $connexionDB->query("INSERT INTO occupation(dateD, dateF, lit) VALUES ('" . $debut . "','" . $fin . "','" . $nlit . "')");

            $connexionDB->exec($insert);

            $id_occupation = $connexionDB->lastInsertId();

        }else{
            $query = "UPDATE occupation SET dateD=?, dateF=?, lit=? WHERE idOCCUPATION=?";

            $query = $connexionDB->prepare($query);

            $query->execute(array($debut, $fin, $nlit, $id_occupation));

        }

        $query = "UPDATE patient SET nom_p=?, prenom_p=?, numSC=? , adresse_p=?, numTel_p=?, DateNaissance_p=?,DateRdv=?, idOccupation=? WHERE idPATIENT=?";

        $query = $connexionDB->prepare($query);

        $query->execute(array($nom, $prenom, $numSC, $adresse, $numTel, $dateN, $dateR, $id_occupation, $idPATIENT));

        header("location:listePatient.php");
    } catch
    (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}
// dans le cas ou je modifie et je vide tt les cases de l'occup çe se supprime de la bdd?
