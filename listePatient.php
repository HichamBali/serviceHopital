<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">


    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php
include 'home.html';
?>
<!-- ici on affiche le tableau -->
<div class="table-responsive" id="table_medecin">

    <table id="autoGeneratedID" role="grid" class="table table-striped table-bordered">
        <caption class="sr-only">Liste des patients.</caption>
        <!-- le head du tableau-->
        <thead>
        <tr>
            <th id="idPATIENT" role="gridcell">ID</th>
            <th id="nom_p" role="gridcell">Nom</th>
            <th id="prenom_p" role="gridcell">Prénom</th>
            <th id="numSC" role="gridcell">NumSC</th>
            <th id="adresse_p" role="gridcell">Adresse</th>
            <th id="numTel_p" role="gridcell">Téléphone</th>
            <th id="DateNaissance_p" role="gridcell">Date de naissance</th>
            <th id="DateRdv" role="gridcell">Rendez-vous</th>
        </tr>
        </thead>
        <tbody>
        <!--ici on recupere les donnee du tab de la bdd -->
        <?php
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=service;charset=utf8','root','') ;
        }catch(Exception $e){
            echo "errreur" ;
        }

        $r=$bdd->query('SELECT * FROM patient');
        $row_count = 1;
        while($donne=$r->fetch()){
            ?>
            <tr>

                <td id="ids" role="gridcell"><?php echo $donne['idPATIENT'];?></td>
                <td id="nom_p" role="gridcell"><?php echo $donne['nom_p'];?></td>
                <td id="prenom_p" role="gridcell"><?php echo $donne['prenom_p'];?></td>
                <td id="numSC" role="gridcell"><?php echo $donne['numSC'];?></td>
                <td id="adresse_p" role="gridcell"><?php echo $donne['adresse_p'];?></td>
                <td id="numTel_p" role="gridcell"><?php echo $donne['numTel_p'];?></td>
                <td id="DateNaissance_p" role="gridcell"><?php echo $donne['DateNaissance_p'];?></td>
                <td id="DateRdv" role="gridcell"><?php echo $donne['DateRdv'];?></td>

            </tr>
            <?php
            $row_count ++ ;
        }
        ?>

        <tbody>
    </table>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js'></script>
<script src='http://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js'></script>

<!--ce script pour le fonctionnement des deux btn delete & edit il prend en parametre #idDuTABLEAU et fait appelle à modifier.php-->
<script>

    $(document).ready(function(){
        $('#autoGeneratedID').Tabledit({
            url:'modifierPatient.php',
            columns:{
                identifier:[0, "idPATIENT"],
                editable:[[1, 'nom_p'], [2, 'prenom_p'],[3, 'numSC'], [4, 'adresse_p'],[5, 'numTel_p'], [6, 'DateNaissance_p'], [7, 'DateRdv']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });


        /* ici c'est le script de dataTable au lieu de faire appelle à index.js on l'a copié ici pour que ça fonctionne*/

        $('#autoGeneratedID').dataTable({
            "columnDefs": [
                { "orderable": false, "targets": 0 }/*il y'avait 3 pour le double clique et modifier*/
            ]
        } );
        $('#autoGeneratedID td').attr('role', 'gridcell');
        $('#autoGeneratedID tr').attr('role', 'row');
        $('#autoGeneratedID th').attr('role', 'gridcell');
        $('#autoGeneratedID table').attr('role', 'grid');
        // $('#autoGeneratedID td:nth-of-type(-n+3)').attr('contenteditable', 'true');

    });

</script>
<!--pour afficher les btn delete et edit-->
<script src="js/jquery/jquery.tabledit.js"></script>

</body>

</html>