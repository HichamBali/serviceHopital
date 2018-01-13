<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 11/01/2018
 * Time: 23:50
 */

if(isset($_POST["id"]))
{
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "service");
    $query = "SELECT * FROM secretaire WHERE secretaire.idSECRETAIRE = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));


}

