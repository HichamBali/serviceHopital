<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 05/01/2018
 * Time: 23:34
 */


// pour afficher le nom & prénom du patient
if(isset($_POST["id"]))
{

   $connect = mysqli_connect("localhost", "root", "", "service");
   // $query = "SELECT * FROM consultation LEFT JOIN patient ON consultation.idPatient = patient.idPATIENT  WHERE idPATIENT= '" . $_POST["id"] . "'";

   $query = "SELECT * FROM patient WHERE idPATIENT = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));

}

