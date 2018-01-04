<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 18/11/2017
 * Time: 10:53
 */


/**
Connexion à la bdd et 2 requêtes modifier et supprimer
 */

$connect = mysqli_connect('localhost', 'root', '', 'service');

$input = filter_input_array(INPUT_POST);

/*on ne sait pas la syntaxe du"mysqli_real_escape_string" en PDO c'est pour ça on a utilisé MySqli */

$nom_p = mysqli_real_escape_string($connect, $input["nom_p"]);
$prenom_p = mysqli_real_escape_string($connect, $input["prenom_p"]);
$grade_p = mysqli_real_escape_string($connect, $input["numSC"]);
$adresse_p = mysqli_real_escape_string($connect, $input["adresse_p"]);
$numTel_p = mysqli_real_escape_string($connect, $input["numTel_p"]);
$specialite_p = mysqli_real_escape_string($connect, $input["DateNaissance_p"]);
$numTel_p = mysqli_real_escape_string($connect, $input["DateRdv_p"]);
/*
if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM patient 
 WHERE idPATIENT = '".$input["idPATIENT"]."'
 ";
    mysqli_query($connect, $query);
}
if($input["action"] === 'edit')
{*/
    $query = "
 UPDATE patient
 SET nom_p = '".$nom_p."', 
 prenom_p = '".$prenom_p."',
 numSC='".$numSC."',
adresse_p = '".$adresse_p."',
numTel_p = '".$numTel_p."',
DateNaissance_p = '".$DateNaissance_p."',
DateRdv = '".$DateRdv."'

 WHERE idPATIENT = '".$input["idPATIENT"]."'
 ";
    mysqli_query($connect, $query);

echo json_encode($input);
?>