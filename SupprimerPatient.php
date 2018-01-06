<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01/01/2018
 * Time: 17:48
 */

$connect = mysqli_connect("localhost", "root", "", "service");
if(isset($_POST["id"]))
{
    $query = "DELETE FROM patient WHERE idPATIENT = '".$_POST["id"]."'";
    if(mysqli_query($connect, $query))
    {
        echo 'Patient supprimé';
    }
}

// utiliser des sweet alerts et actualiser la page
//supprimer occupation en cascade