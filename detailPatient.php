
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
    $query = "SELECT * FROM patient LEFT JOIN occupation ON patient.idOccupation = occupation.idOCCUPATION  WHERE idPATIENT = '" . $_POST["id"] . "'";

    $result = mysqli_query($connect, $query);
    $result2 = mysqli_query($connect, $query);// pour l'utiliser dans l'affichage de l'occupation

    $output .= '  
  <div>
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
<h4><b>Informations générales:</b></h4>

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

    // <!--ici code occupation-->
    $output .= '
     <div class="table-responsive">  
     <table class="table table-bordered">';
    while ($row = mysqli_fetch_array($result2)) {
        $output .= '
    <h4><b>Occupation:</b></h4>

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


    echo $output;
}