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



$nom_s = mysqli_real_escape_string($connect, $input["nom_s"]);
$prenom_s = mysqli_real_escape_string($connect, $input["prenom_s"]);
$numTel_s = mysqli_real_escape_string($connect, $input["numTel_s"]);
$adresse_s = mysqli_real_escape_string($connect, $input["adresse_s"]);
$niveau_s = mysqli_real_escape_string($connect, $input["niveau_s"]);

if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM secretaire 
 WHERE idSECRETAIRE = '".$input["idSECRETAIRE"]."'
 ";
    mysqli_query($connect, $query);
}
if($input["action"] === 'edit')
{
    $query = "
 UPDATE secretaire 
 SET nom_s = '".$nom_s."', 
 prenom_s = '".$prenom_s."',
 numTel_s = '".$numTel_s."',
adresse_s = '".$adresse_s."',
niveau_s = '".$niveau_s."',
numTel_s = '".$numTel_s."'
 WHERE idSECRETAIRE = '".$input["idSECRETAIRE"]."'
 ";
    mysqli_query($connect, $query);
}
echo json_encode($input);
?>