

<!DOCTYPE html>
<html>
<head>
    <link charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <link href='https://fonts.googleapis.com/css?family=open+sans' rel="stylesheet" type="text/css"></head></html>
<?php
$a=$_GET['n'];
try {
    $dbh = new PDO('mysql:host=localhost;dbname=service', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $number=$dbh->query("SELECT * FROM medecin LIMIT $a,2");
    $number->execute();


    echo '<tr><td>Nom </td><td> Prenom</td><td> Adresse</td><td>Grade</td><td>Specialite</td><td>Telephone</td></tr>';
    for($i = 0;$row = $number->fetch(); $i++) {

        echo
            '<tr>'.
            '<td>'.$row['nom_m'].'</td>'.
            '<td>'.$row['prenom_m'].'</td>'.
            '<td>'.$row['adresse_m'].'</td>'.
            '<td>'.$row['grade_m'].'</td>'.
            '<td>'.$row['specialite_m'].'</td>'.
            '<td>'.$row['numTel_m'].'</td>'.
            '</tr>';

    }}
catch (PDOException $e){
    die("erreur de connexion" . $e->getMessage());
}

?>