<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 19/11/2017
 * Time: 22:37
 */


/**
Connexion à la bdd et 2 requêtes modifier et supprimer
 */

$connect = mysqli_connect('localhost', 'root', '', 'service');

$input = filter_input_array(INPUT_POST);

/*on ne sait pas la syntaxe du"mysqli_real_escape_string" en PDO c'est pour ça on a utilisé MySqli */



$nom_i = mysqli_real_escape_string($connect, $input["nom_i"]);
$prenom_i = mysqli_real_escape_string($connect, $input["prenom_i"]);
$specialite_i = mysqli_real_escape_string($connect, $input["specialite_i"]);
$numTel_i = mysqli_real_escape_string($connect, $input["numTel_i"]);
$adresse_i = mysqli_real_escape_string($connect, $input["adresse_i"]);


if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM infirmier 
 WHERE idINFIRMIER = '".$input["idINFIRMIER"]."'
 ";
    mysqli_query($connect, $query);
}
if($input["action"] === 'edit')
{
    $query = "
 UPDATE infirmier 
 SET nom_i = '".$nom_i."', 
 prenom_i = '".$prenom_i."',
specialite_i = '".$specialite_i."',
numTel_i = '".$numTel_i."',
adresse_i = '".$adresse_i."'
 WHERE idINFIRMIER = '".$input["idINFIRMIER"]."'
 ";
    mysqli_query($connect, $query);
}
echo json_encode($input);
?>