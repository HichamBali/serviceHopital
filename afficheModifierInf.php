<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/01/2018
 * Time: 00:31
 */

if(isset($_POST["id"]))
{
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "service");
    $query = "SELECT * FROM infirmier WHERE infirmier.idINFIRMIER = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));


}

