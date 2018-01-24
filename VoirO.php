<?php

if(isset($_GET['n']))
$n=$_GET['n'];
else header("location: listePatient.php");




$dbh = new PDO("mysql:host=localhost;dbname=service", "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt1=$dbh->prepare("SELECT * FROM consultation WHERE idCONSULTATION =$n");
$stmt1->execute();
$ordo=$stmt1->fetch();

$id_med=$ordo['idMedecin'];
$id_pat=$ordo['idPatient'];

$stmt2=$dbh->prepare("SELECT * FROM medecin WHERE idMEDECIN =$id_med");
$stmt2->execute();
$ordo1=$stmt2->fetch();


$stmt3=$dbh->prepare("SELECT * FROM patient WHERE idPATIENT =$id_pat");
$stmt3->execute();
$ordo2=$stmt3->fetch();







?>




<html>
<head>
    
    
    
    </head>

<body>
    <center>
    <div class="ordo" id="ordo">
    
    <center><h2>Ordonnace</h2></center>
    Nom et Prénom: <?php echo $ordo2['nom_p'].' '.$ordo2['prenom_p'];?><br>
    Date: <?php echo $ordo['dateCons']; ?><br>
    Medecin: <?php echo $ordo1['nom_m'].' '.$ordo1['prenom_m']; ?><br>
        
        
        <hr>
        
        <h3>Traitement</h3><br>
        
        <?php echo $ordo['ordonnance'];?>
    
    
    </div>
    <button class="btn btn-info" onclick="printDiv()">Imprimmer</button>
    </center>
    
    
    
      <script>
    function printDiv() {

 var printContents = document.getElementById('ordo').innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
    
    
    </script>
    </body>

<style>
    
    .ordo{
        border: solid;
        border-color: black;
        height: 600px;
        width: 500px;
        
        
        
    }
    
    
    
    </style>

</html>