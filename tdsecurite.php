<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title id="1">bienvenue</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Hichem
 * Date: 13/11/2017
 * Time: 12:20
 */

try {
    $dbh = new PDO('mysql:host=localhost;dbname=cours_web', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $number=$dbh->query("SELECT * FROM commentaire");
    $number->execute();
    echo '<table><tr><td>Commentaires</td></tr>';
    for($i = 0;$row = $number->fetch(); $i++) {

        echo
            '<tr>'.
            '<td>'.$row['text'].'</td>'.
            '</tr>';
    }echo '</table>';}
catch (PDOException $e){
    die("erreur de connexion" . $e->getMessage());
}
?>
<form method="post" action="insert.php">
<input type="text" value="" name="msg">
    <input type="submit" value="commenter">
</form>