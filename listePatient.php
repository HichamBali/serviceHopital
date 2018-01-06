<div>
    <?php
    include 'home.php';
    ?>
</div>
<!--Formulaire-->

<div id="add_data_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Informations patient</h2>
            </div>
            <div class="modal-body">

                <br/>
                <form method="post" id="insert_form" action="ajouterPatient.php">
                    <h4><b><u>Informations générales :</u></b></h4>
                    <label>Nom</label>
                    <input type="text" name="nom_p" id="nom" class="form-control" />
                    <br/>

                    <label>Prénom</label>
                    <input type="text" name="prenom_p" id="prenom" class="form-control" />
                    <br/>

                    <label>NumSC</label>
                    <input type="text" name="numSC" id="numSC" class="form-control" />
                    <br/>

                    <label>Adresse</label>
                    <textarea name="adresse_p" id="adresse" class="form-control"></textarea>
                    <br/>

                    <label>Téléphone</label>
                    <input type="text" name="numTel_p" id="numTel" class="form-control" />
                    <br/>

                    <label>Date de naissance</label>
                    <input type="date" name="DateNaissance_p" id="dateN" class="form-control"/>
                    <br/>

                    <label>Date de rendez-vous</label>
                    <input type="date" name="DateRdv" id="dateR" class="form-control"/>
                    <br/>


                    <!--Hôspitalisation-->

                    <h4><b><u>Occupation :</u></b></h4>
                    <br/>

                    <label>Date de début</label>
                    <input type="date" name="dateD" id="debut" class="form-control"/>

                    <br/><label>Date de fin</label>
                    <input type="date" name="dateF" id="fin" class="form-control"/>

                    <br/><label>N° lit</label>
                    <input type="text" name="lit" id="nlit" class="form-control"/>
                    <br/>


                    <input type="hidden" name="id" id="id" />
                    <input type="submit" name="insert" id="insert" value="Valider" class="btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>


<!--afficher les details-->

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"> Details patient</h2>
            </div>
            <div class="modal-body" id="detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<!--Consultation-->

<div id="add_consult" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Consultation</h2>
            </div>
            <div class="modal-body">

                <br/>
                <form method="post" id="consult_form" action="ajoutConsult.php">

                    <label>Nom</label>
                    <input type="text" name="nom_p" id="nomp" class="form-control" />
                    <br/>

                    <label>Prénom</label>
                    <input type="text" name="prenom_p" id="prenomp" class="form-control" />
                    <br/>

                    <label>Date: </label>
                    <input type="date" name="dateCons" id="dateC" class="form-control"/>
                    <br/>

                    <label>Rapport</label>
                    <textarea cols='20' rows='5' name="rapport" id="rap" class="form-control"></textarea>
                    <br/>
                    <div align="right">
                        <input type="button" onclick="javascript:window.print()" value="Imprimer le rapport" class="btn btn-success" />
                    </div>
                    <br/>

                    <label>Ordonnance</label>
                    <textarea cols='20' rows='5' name="ordonnance" id="ordo" class="form-control" ></textarea>
                    <br/>
                    <div align="right">
                        <input type="button" onclick="javascript:window.print()" value="Imprimer l'ordonnance" class="btn btn-success" />
                    </div>
                    <br/>

                    <label>Orientation</label>
                    <textarea cols='20' rows='5' name="orientation" id="orient" class="form-control" ></textarea>
                    <br/>
                    <div align="right">
                        <input type="button" onclick="javascript:window.print()" value="Imprimer l'orientation" class="btn btn-success" />
                    </div>
                    <br/>


                    <label>Certificat</label>
                    <textarea cols='20' rows='5' name="certificat" id="cert" class="form-control"></textarea>
                    <br/>
                    <div align="right">
                        <input type="button" onclick="javascript:window.print()" value="Imprimer certificat" class="btn btn-success" />
                    </div>
                    <br/>
                    <input type="hidden" name="id" id="id" /><!--je recupère id du patient-->
                    <input type="submit" name="ajouter" id="ajouter" value="Valider" class="btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>

        </div>
    </div>
</div>

<!--EXAMEN-->

<div id="add_exam" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Ajouter examen</h2>
            </div>
            <div class="modal-body">

                <br/>
                <form method="post" id="exam_form" action="ajoutExamen.php">

                    <label>Date de l'examen</label>
                    <input type="date"  name="dateExamen" id="dateE" class="form-control"/>
                    <br/>

                    <label>Type de l'examen</label>
                    <input type="text" name="type" id="type" class="form-control"/>
                    <br/>



                    <form method="post" action="reception.php" enctype="multipart/form-data">

                        <label for="icone">Resultat Examen</label><br />
                        <input type="file" name="icone" id="icone" /><br />

                    </form>


                    <br/>

                    <label>Rapport</label>
                    <textarea cols='20' rows='5' name="fichier" id="fichier" class="form-control" ></textarea>
                    <br/>

                    <input type="hidden" name="id" id="id" /><!--je recupère id du patient-->
                    <input type="submit" name="ajouterExamen" id="ajouterExamen" value="Valider" class="btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>

        </div>
    </div>
</div>

<!--IPRESSION DE L'ordonnance-->
<div>


</div>



<!-- la liste patients "table" -->

<div align="center">
    <h2>Liste Patients</h2>
</div>
<div align="right">

    <!--btn ajouter-->
    <button type="button" name="ajout" id="ajout" class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal">
        <i class="fa fa-plus"></i>Ajouter</button>
</div>
<br/>
<div class="table-responsive" id="table_patient">

    <table id="autoGeneratedID" role="grid" class="table table-striped table-bordered">
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
            <th id="operation">Opération</th>
            <th id="consultation">Consultation</th>
            <th id="consultation">Examen</th>



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

                <td id="idPATIENT" role="gridcell"><?php echo $donne['idPATIENT'];?></td>
                <td id="nom_p" role="gridcell"><?php echo $donne['nom_p'];?></td>
                <td id="prenom_p" role="gridcell"><?php echo $donne['prenom_p'];?></td>
                <td id="numSC" role="gridcell"><?php echo $donne['numSC'];?></td>
                <td id="adresse_p" role="gridcell"><?php echo $donne['adresse_p'];?></td>
                <td id="numTel_p" role="gridcell"><?php echo $donne['numTel_p'];?></td>
                <td id="DateNaissance_p" role="gridcell"><?php echo $donne['DateNaissance_p'];?></td>
                <td id="DateRdv" role="gridcell"><?php echo $donne['DateRdv'];?></td>
                <td>
                    <!-- <input type="button" name="details" value="Details" id="?php echo $donne["idPATIENT"];?>"
                            class="btn btn-info btn-md view_data"/>
                     <input type="button" name="edit" value="Modifier" id="?php echo $donne["idPATIENT"];?>"
                            class="btn btn-warning btn-md edit_data"/>
                     <input type="button" name="delete" value="Supprimer" id="?php echo $donne["idPATIENT"];?>"
                            class="btn btn-danger btn-md delete_data"/>-->


                    <div class="btn-group">
                        <button type="button"
                                class="btn btn-primary btn-lm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><input type="button" name="details" value="Details" id="<?php echo $donne["idPATIENT"];?>
                                "class="btn btn-success btn-md view_data btn-block"/></li>
                            <li class="divider"></li>

                            <li><input type="button" name="edit" value="Modifier" id="<?php echo $donne["idPATIENT"];?>"
                                       class="btn btn-warning btn-md edit_data btn-block"/></li>


                            <li><input type="button" name="delete" value="Supprimer" id="<?php echo $donne["idPATIENT"];?>"
                                       class="btn btn-danger btn-md delete_data btn-block"/></li>
                        </ul>
                    </div>


                </td>
                <td>
                    <input type="button" name="consult" value="Consultation" id="<?php echo $donne["idPATIENT"];?>"
                           class="btn btn-info consult_data" data-toggle="modal" data-target="#add_consult"/>
                </td>
                <td>
                    <input type="button" name="exam" value="Examen" id="<?php echo $donne["idPATIENT"];?>"
                           class="btn btn-info exam_data" data-toggle="modal" data-target="#add_exam"/>
                </td>



            </tr>
            <?php
            $row_count ++ ;
        }
        ?>

        <tbody>
    </table>

</div>
<!-- pose problème <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src='http://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js'></script>
<script src='http://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js'></script>

<!--ce script pour le fonctionnement des deux btn delete & edit il prend en parametre #idDuTABLEAU et fait appelle à modifier.php-->
<script>

    $(document).ready(function(){


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

    //bouton ajouter

    $('#ajout').click(function () {
        $('#insert').val("Valider");
        $('#insert_form')[0].reset();
    });


    /******************** bouton modifier*********************/

    $(document).on('click', '.edit_data', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "pageModier.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                //remplir les cases avec les anciens données
                $('#nom').val(data.nom_p);
                $('#prenom').val(data.prenom_p);
                $('#numSC').val(data.numSC);
                $('#adresse').val(data.adresse_p);
                $('#numTel').val(data.numTel_p);
                $('#dateN').val(data.DateNaissance_p);
                $('#dateR').val(data.DateRdv);
                $('#debut').val(data.dateD);
                $('#fin').val(data.dateF);
                $('#nlit').val(data.lit);

                $('#id').val(data.idPATIENT);

                $('#insert').val("Modifier");
                $('#add_data_Modal').modal('show');


            }

        });
    });


    /*********************** pour le bouton ajouter ******************/
    /*
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
             if ($('#nom').val() == "") {          // si le champs nom n'est pas vide

                 alert("Le nom est obligatoire!");  //ç n marche pas .. j v essayer les sweet alert!
             }
             else {
            $.ajax({
                url: "ajouterPatient.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    $('#insert').val("Valider");
                },
                success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#table_patient').html(data);
                }
            });
            //}
        });
        */
    /***************************DETAILS Patient***************************/

    // si on clique sur detail
    $(document).on('click', '.view_data', function () {

        var id = $(this).attr("id");

        if (id != '') {                            // si le id existe
            $.ajax({
                url: "detailPatient.php",                   // appelle à la page detailPatient pour afficher les details
                method: "POST",
                data: {id: id},
                success: function (data) {
                    $('#detail').html(data);
                    $('#dataModal').modal('show');   // afficher la page detail
                }
            });
        }
    });


    /******************************* SUPPRIMER Patient********************/


    $(document).on('click', '.delete_data', function(){
        var id = $(this).attr("id");
        if(confirm("êtes vous sûr de supprimer ce patient?"))
        {
            $.ajax({
                url:"SupprimerPatient.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#table_patient').html('<div class="alert alert-success">'+data+'</div>');
                    $('#autoGeneratedID').DataTable().destroy();

                }
            });
            setInterval(function(){
                $('#table_patient').html('');
            }, 5000);
        }
    });

    /******************CONSULTATION*****************/

    $(document).on('click', '.consult_data', function () {

        var id = $(this).attr("id");

        $.ajax({
            url: "consultation.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                //remplir les cases avec les anciens données
                $('#nomp').val(data.nom_p);
                $('#prenomp').val(data.prenom_p);
                $('#consult').html(data);
                $('#id').val(data.idPATIENT);
                $('#ajouter').val("valider");
                $('#add_consult').modal('show');
            }

        });

    });

</script>



