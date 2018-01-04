<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01/01/2018
 * Time: 17:48
 */

//on supprime le patient et son occupation si elle existe

$connect = mysqli_connect("localhost", "root", "", "service");
if(isset($_POST["id"]))
{
    $query = "DELETE FROM patient LEFT JOIN occupation ON patient.idOccupation = occupation.idOCCUPATION  WHERE idPATIENT = '" . $_POST["id"] . "'";
    if(mysqli_query($connect, $query))
    {
        echo 'Patient supprimé';
    }
}
// utiliser des sweet alerts et actualiser la page