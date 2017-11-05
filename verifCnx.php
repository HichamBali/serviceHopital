<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 02/11/2017
 * Time: 11:44
 */

$user = $_POST['user'];
$password = $_POST['password'];
try {
    //connexion à la base de donnée
    $connexionDB = new PDO("mysql:host=localhost;dbname=service", "root", "");
    $connexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch
(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
// Hachage du mot de passe
$pass_hache = sha1($_POST['password']);

// Vérification des identifiants
$req = $connexionDB->prepare('SELECT idUser FROM users WHERE user = ? AND password = ?');
$req->execute(array(
    $user,$password));

$resultat = $req->fetch();

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
} else {
    session_start();
    echo 'Vous êtes connecté !';
    header("location:secretaire.html");
}
?>