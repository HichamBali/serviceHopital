<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 06/01/2018
 * Time: 20:56
 */

$idPATIENT = $_POST['id'];

if(isset($idPATIENT))
{

    $connect = mysqli_connect("localhost", "root", "", "service");

    $query = "SELECT * FROM patient LEFT JOIN occupation ON patient.idPATIENT = occupation.idPatient WHERE patient.idPATIENT = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));

}

