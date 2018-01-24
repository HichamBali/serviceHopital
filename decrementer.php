<?php

$dbh = new PDO("mysql:host=localhost;dbname=service", "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id=$_POST['id'];

$stmt=$dbh->prepare("UPDATE chambre SET nbOccuped = nbOccuped - 1 WHERE idCHAMBRE=$id and nbOccuped > 0");
if($stmt->execute())
{
    echo "success";
    
}
else echo "error";

?>