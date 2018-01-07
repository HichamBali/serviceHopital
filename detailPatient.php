
<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 01/01/2018
 * Time: 01:39
 */

if(isset($_POST["id"])) {
    $output = '';

    $connect = mysqli_connect("localhost", "root", "", "service");
    $query1= "SELECT * FROM patient WHERE patient.idPATIENT = '" . $_POST["id"] . "'";
    $query2 = "SELECT * FROM patient LEFT JOIN occupation ON patient.idPATIENT = occupation.idPatient WHERE patient.idPATIENT = '" . $_POST["id"] . "'";
    $result = mysqli_query($connect, $query1);
    $result2 = mysqli_query($connect, $query2);// pour l'utiliser dans l'affichage de l'occupation
    $query3 = "SELECT * FROM patient LEFT JOIN consultation ON patient.idPATIENT = consultation.idPatient WHERE patient.idPATIENT = '" . $_POST["id"] . "'";
    $result3 = mysqli_query($connect, $query3);
    $query4 = "SELECT * FROM patient LEFT JOIN examen ON patient.idPATIENT = examen.idPatient WHERE patient.idPATIENT = '" . $_POST["id"] . "'";
    $result4 = mysqli_query($connect, $query4);

    $output .= '  
  <div>
      <div class="table-responsive">  
           <table class="table table-bordered">
           <h4><b>Informations générales:</b></h4>';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '


     <tr>  
            <td width="30%"><label>Nom</label></td>  
            <td width="70%">' . $row["nom_p"] . '</td>  
        </tr>
         <tr>  
            <td width="30%"><label>Prénom</label></td>  
            <td width="70%">' . $row["prenom_p"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>NumSC</label></td>  
            <td width="70%">' . $row["numSC"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Address</label></td>  
            <td width="70%">' . $row["adresse_p"] . '</td>  
        </tr>
        
        <tr>  
            <td width="30%"><label>Téléphone</label></td>  
            <td width="70%">' . $row["numTel_p"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Date de naissance</label></td>  
            <td width="70%">' . $row["DateNaissance_p"] . '</td>  
        </tr>
         <tr>  
            <td width="30%"><label>Rendez-vous</label></td>  
            <td width="70%">' . $row["DateRdv"] . '</td>  
        </tr>

        <!--ici code occupation-->
        <br/>
     ';
    }
    $output .= '</table></div>';


    // affichage de la dernière occupation
    // <!--ici code occupation-->
    $output .= '
     <div class="table-responsive">  
     <table class="table table-bordered">
      <h4><b>Occupation:</b></h4>';
    while ($row = mysqli_fetch_array($result2)) {

        $output .= '
   
    
     <tr>
            <td width="30%"><label>Date de début</label></td>  
            <td width="70%">' . $row["dateD"] . '</td>  
        </tr>
         <tr>  
            <td width="30%"><label>Date de fin</label></td>  
            <td width="70%">' . $row["dateF"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>N° Lit</label></td>  
            <td width="70%">' . $row["lit"] . '</td>  
        </tr>
       
        
        <br/>';

    }

    $output .= '</table></div>';
    $output .= '</div>';


    $output .= '
     <div class="table-responsive">  
     <table class="table table-bordered">
      <h4><b>Consultations:</b></h4>';
    while ($row = mysqli_fetch_array($result3)) {
// il faut ajouter nom du médecin
        $output .= '
   
    
        <tr>
            <td width="30%"><label>Date de la consulation</label></td>  
            <td width="70%">' . $row["dateCons"] . '</td>  
        </tr>
         <tr>  
            <td width="30%"><label>Rapport</label></td>  
            <td width="70%">' . $row["rapport"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Ordonnance</label></td>  
            <td width="70%">' . $row["ordonnance"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Orientation</label></td>  
            <td width="70%">' . $row["orientation"] . '</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Certificat</label></td>  
            <td width="70%">' . $row["certificat"] . '</td>  
        </tr>
       
        
        <br/>';

    }

    $output .= '</table></div>';
    $output .= '</div>';

  /*  $output .='
    <div>
<ul class="pager">
  <li class="previous"><a href="#">Previous</a></li>
  <li class="next"><a href="#">Next</a></li>
</ul>
</div>*
    ';*/


    echo $output;
}
?>

