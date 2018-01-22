<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 21/01/2018
 * Time: 23:51
 */
if(isset($_POST["id"]))
{
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "service");
    $query = "SELECT * FROM examen WHERE examen.idEXAMEN = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query);
    echo json_encode(mysqli_fetch_array($result));

}
