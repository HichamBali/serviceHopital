<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 05/01/2018
 * Time: 23:34
 */
// A SUUPPPPPRIIIIIIMERRR

// pour afficher le nom & prénom du patient
if(isset($_POST["id"]))
{

    $connect = mysqli_connect("localhost", "root", "", "service");

    $query = "SELECT * FROM patient LEFT JOIN consultation ON patient.idPATIENT = consultation.idPatient WHERE patient.idPATIENT =
 '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));

}

