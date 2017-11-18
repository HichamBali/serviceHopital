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



$nom_m = mysqli_real_escape_string($connect, $input["nom_m"]);
$prenom_m = mysqli_real_escape_string($connect, $input["prenom_m"]);
$adresse_m = mysqli_real_escape_string($connect, $input["adresse_m"]);
$grade_m = mysqli_real_escape_string($connect, $input["grade_m"]);
$specialite_m = mysqli_real_escape_string($connect, $input["specialite_m"]);
$numTel_m = mysqli_real_escape_string($connect, $input["numTel_m"]);

if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM medecin 
 WHERE idMEDECIN = '".$input["idMEDECIN"]."'
 ";
    mysqli_query($connect, $query);
}
if($input["action"] === 'edit')
{
    $query = "
 UPDATE medecin 
 SET nom_m = '".$nom_m."', 
 prenom_m = '".$prenom_m."',
adresse_m = '".$adresse_m."',
grade_m = '".$grade_m."',
specialite_m = '".$specialite_m."',
numTel_m = '".$numTel_m."'
 WHERE idMEDECIN = '".$input["idMEDECIN"]."'
 ";
    mysqli_query($connect, $query);
}
echo json_encode($input);
?>