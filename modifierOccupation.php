<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 08/01/2018
 * Time: 00:26
 */

/**
Connexion à la bdd et 2 requêtes modifier et supprimer
 */

$connect = mysqli_connect('localhost', 'root', '', 'service');

$input = filter_input_array(INPUT_POST);


$lit = mysqli_real_escape_string($connect, $input["lit"]);
$dateD = mysqli_real_escape_string($connect, $input["dateD"]);
$dateF = mysqli_real_escape_string($connect, $input['dateF']);

if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM occupation 
 WHERE idOCCUPATION = '".$input["idOCCUPATION"]."'
 ";
    mysqli_query($connect, $query);
}
if($input["action"] === 'edit')
{
    $query = "
 UPDATE occupation
 SET lit = '".$lit."', 
 dateD = '".$dateD."',
dateF = '".$dateF."',

 WHERE idOCCUPATION = '".$input["idOCCUPATION"]."'
 ";
    mysqli_query($connect, $query);
}
echo json_encode($input);
