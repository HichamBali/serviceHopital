<?php
//Affichage de la page modifierPatient
//remplir les cases avec les anciens données


if(isset($_POST["id"]))
{
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "service");
    $query = "SELECT * FROM patient LEFT JOIN occupation ON patient.idOccupation = occupation.idOCCUPATION  WHERE idPATIENT = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));

}



















