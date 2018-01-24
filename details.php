<?php
session_start();

if(isset($_GET['idp']))
{$idp=$_GET['idp'];
    $_SESSION['idp']=$idp;
}
else{
    $idp=$_SESSION['idp'];
}


$dbh = new PDO("mysql:host=localhost;dbname=service", "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt1=$dbh->prepare("SELECT * FROM patient WHERE idPATIENT =$idp");
$stmt1->execute();

$resultat=$stmt1->fetch();

$stmt2=$dbh->prepare("SELECT * FROM consultation WHERE idPatient =$idp");
$stmt2->execute();

$stmt3=$dbh->prepare("SELECT * FROM examen WHERE idPatient =$idp");
$stmt3->execute();

$stmt4=$dbh->prepare("SELECT * FROM occupation WHERE idPatient =$idp");
$stmt4->execute();
$chambreLibre=$dbh->prepare("SELECT idCHAMBRE FROM chambre WHERE nbOccuped < nombreLit");
$chambreLibre->execute();
$re=$chambreLibre->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">


    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.2.1.js"></script> c'est le même-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">Consultation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#education">Examen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">Hôspitalisation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="listePatient.php">retour</a>
            </li>

        </ul>
    </div>
</nav>

<div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h2 class="mb-0"><?php echo $resultat['nom_p']?>
                <span class="text-primary"><?php echo $resultat['prenom_p']?></span>
            </h2>
            <br/>
            <h3 class="mb-0"> Date de naissance:
                <span class="text-primary"><?php echo $resultat['DateNaissance_p']?></span>
            </h3>
            <br/>
            <h3 class="mb-0"> N° SC:
                <span class="text-primary"><?php echo $resultat['numSC']?></span>
            </h3>
            <br/>
            <h3 class="mb-0"> N° Tel:
                <span class="text-primary"><?php echo $resultat['numTel_p']?></span>
            </h3>
            <br/>
            <h3 class="mb-0"> Adresse:
                <span class="text-primary"><?php echo $resultat['adresse_p']?></span>
            </h3>
            <br/>
            <h3 class="mb-0"> Rendez-vous:
                <span class="text-primary"><?php echo $resultat['DateRdv']?></span>
            </h3>


        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h3 class="mb-5">Consultation</h3>

            <button type="button" name="ajout" id="addcons" class="btn btn-primary" onclick="$('#ajoutC').modal('show');">
                <i class="fa fa-plus"></i>Ajouter</button>
        </div>

        <br>

        <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <!-- col md sm ...-->

            <div class="table-responsive">

                <table id="tableC" role="grid" class="table table-bordered">


                    <thead>
                    <tr>
                        <th style="display:none">id</th>
                        <th>Rapport</th>
                        <th>Ordonnance</th>
                        <th>Orientation</th>
                        <th>Certifica</th>
                        <th>Date de consultation</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    <!--ici on recupere les donnee du tab de la bdd -->
                    <?php
                    while($row =  $stmt2->fetch())
                    {
                        echo '
      <tr>
      <td style="display:none">'.$row["idCONSULTATION"].'</td>
       <td>'.$row["rapport"].'</td>
       <td>'.$row["ordonnance"].'</td>
       <td>'.$row["orientation"].'</td>
       <td>'.$row["certificat"].'</td>
       <td>'.$row["dateCons"].'</td>
       
        <td>

                    <div class="btn-group">
                        <button type="button"
                                class="btn btn-primary btn-lm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                            <li><input type="button" name="edit" value="Modifier" id="'.$row["idCONSULTATION"].'"
                                       class="btn btn-info btn-md edit_data btn-block"/></li>

                            <li><input type="button" name="delete" value="Supprimer" id="'.$row["idCONSULTATION"].'"
                                       class="btn btn-danger btn-md delete_data btn-block"/></li>
                                       
                                       
                              <li><a  href="VoirO.php?n='.$row["idCONSULTATION"].'" class="btn btn-success btn-md btn-block">Voir<a></li>
                        </ul>
                    </div>


                </td>
      
          

    
       
      </tr>
      ';
                    }
                    ?>

                    <tbody>
                </table>

            </div>


        </div>





    </section>

    <!---------------------------------------------------------EXMAEN------------------------------------------------>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">

        <div class="my-auto">
            <h3 class="mb-5">Examen</h3>
            <div class="col-md-2" >
                <button type="button" name="ajout1" id="addExam" class="btn btn-primary" onclick="$('#ajoutE').modal('show');">
                    <i class="fa fa-plus"></i>Ajouter</button>
            </div>
            <br>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">



                <div class="table-responsive">
                    <table id="tableE" class="table table-bordered ">
                        <thead style="background:white;">
                        <tr>
                            <th style="display:none">id</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Resultat</th>
                            <th>Fichier</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        while($row =  $stmt3->fetch())
                        {
                            echo '
      <tr>
      <td style="display:none">'.$row["idEXAMEN"].'</td>
       <td>'.$row["dateExamen"].'</td>
       <td>'.$row["typeE"].'</td>
       <td>'.$row["resultatExamen"].'</td>
       <td>'.$row["fichierExam"].'</td>
       
       <td>

    <div class="btn-group">
        <button type="button"
                class="btn btn-primary btn-lm dropdown-toggle" data-toggle="dropdown">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">

            <li><input type="button"  value="Modifier" id="'.$row["idEXAMEN"].'"
                class="btn btn-info btn-md edit_data1 btn-block"/></li>

            <li><input type="button"  value="Supprimer" id="'.$row["idEXAMEN"].'"
                class="btn btn-danger btn-md delete_data1 btn-block"/></li>
        </ul>
    </div>
    

</td>


    
       
      </tr>
      ';
                        }
                        ?>

                        </tbody>
                    </table>

                </div>


            </div>
        </div>

    </section>

    <!--------------------------------------------------------OCCUPATION------------------------------------------------>


    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h3 class="mb-5">Hospitalisation</h3>

            <div class="col-md-2" >
                <button type="button" name="ajout2" id="addoccup" class="btn btn-primary" onclick="$('#ajoutO').modal('show');">
                    <i class="fa fa-plus"></i>Ajouter</button>
            </div>
            <br>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">



                <div class="table-responsive">
                    <table id="tableOccupation" class="table table-bordered ">
                        <thead style="background:white;">
                        <tr>
                            <th style="display:none">id</th>
                            <th>Date de début </th>
                            <th>Date de fin</th>
                            <th>N° Chambre</th>
                            <th>Actions </th>



                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        while($row =  $stmt4->fetch())
                        {
                            echo '
      <tr>
      <td style="display:none">'.$row["idOCCUPATION"].'</td>
       <td>'.$row["dateD"].'</td>
       <td>'.$row["dateF"].'</td>
       <td>'.$row["chambre"].'</td>
   
       <td>

    <div class="btn-group">
        <button type="button"
                class="btn btn-primary btn-lm dropdown-toggle" data-toggle="dropdown">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">

            <li><input type="button" name="edit" value="Modifier" id="'.$row["idOCCUPATION"].'"
                                       class="btn btn-info btn-md edit_dataO btn-block"/></li>

            <li><input type="button" name="delete" value="Supprimer" id="'.$row["idOCCUPATION"].'"
                                       class="btn btn-danger btn-md delete_dataO btn-block"/></li>
        </ul>
    </div>
    

</td>
     

    
       
      </tr>
      ';
                        }
                        ?>

                        </tbody>
                    </table>

                </div>


            </div>
        </div>




    </section>




</div>
<!--*****************************************MODALS************************************************-->

<!--MODAL CONSULTATION-->

<div id="ajoutC" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Consultation</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <br/>
                <form method="post" id="insert_form" action="ajoutConsult.php">

                    <label>Rapport</label>
                    <textarea  name="rapport" id="rapport" class="form-control" ></textarea>
                    <br/>

                    <label>Ordonnance</label>
                    <textarea  name="ordonnance" id="ordonnance" class="form-control" ></textarea>
                    <br/>

                    <label>Orientation</label>
                    <textarea  name="orientation" id="orientation" class="form-control" ></textarea>
                    <br/>

                    <label>Certificat</label>
                    <textarea  name="certificat" id="certificat" class="form-control" ></textarea>
                    <br/>

                    <label>Date </label>
                    <input type="date" name="dateCons" id="dateCons" class="form-control"/>
                    <br/>


                    <input type="hidden" name="id" id="id" />
                    <input type="submit" name="insert" id="insert" value="Valider" class=" formBtn btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>

<!--MODAL EXAMEN-->

<div id="ajoutE" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Examen</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <br/>
                <form method="post" id="insert_formE" action="ajoutExamen.php">

                    <label>Date </label>
                    <input type="date" name="dateExamen" id="dateExamen" class="form-control"/>
                    <br/>

                    <label>Type</label>
                    <select  name="typeE" id="typeE" class="form-control" >
                    <option value="IRM">IRM</option>
                           <option value="RADIO">RADIO</option>
                           <option value="ECO">ECO</option>
                           <option value="GROUPAGE">GROUPAGE</option>
                        <option value="ANALYSE SANGUIN">ANALYSE SANGUIN</option>
                    </select>
                    
                    
                    <br/>

                    <label>Resultat</label>
                    <textarea  name="resultatExamen" id="resultatExamen" class="form-control" ></textarea>
                    <br/>

                    <label>Fichier</label>
                    <textarea  name="fichierExam" id="fichierExam" class="form-control" ></textarea>
                    <br/>

                    <input type="hidden" name="insertE" id="insertE" value="Valider">

                    <input type="hidden" name="id" id="id" />
                    <input type="submit" id="examSubmitButton"  value="Valider" class=" formBtn btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>

<div id="ajoutO" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Hospitalisation</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <br/>
                <form method="post" id="insert_formO" action="ajouterOccupation.php">

                    <label>Date Entré </label>
                    <input type="date" name="dateD" id="dateD" class="form-control"/>
                    <br/>

                    <label>Date Sortie</label>
                    <input type="date" name="dateF" id="dateF" class="form-control"/>
                    <br/>

                    <label>Num chambre</label>
                    <select  name="chambre" id="chambre" class="form-control" >
                        <?php
                        foreach ($re as $re){
                            echo "<option value='$re[0]'>".$re[0]."</option>";
                        }
                        ?>

                    </select>
                    <br/>

                    <input type="hidden" name="insertO" id="insertO" value="Valider">

                    <input type="hidden" name="id" id="id" />
                    <input type="submit" id="occupSubmitButton" value="Valider" class=" formBtn btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='http://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js'></script>
<script src='http://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js'></script>


<!-- Bootstrap core JavaScript -->

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/resume.min.js"></script>


<script>
    /******************************************* ajouter consultation*********************************/
    $('#ajout').click(function () {
        $('#insert').val("Valider");
        $('#insert_form')[0].reset();
    });



    /**modifier consultation**/

    $(document).on('click', '.edit_data', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "AffichModifierCons.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                //remplir les cases avec les anciens données
                $('#rapport').val(data.rapport);
                $('#ordonnance').val(data.ordonnance);
                $('#orientation').val(data.orientation);
                $('#certificat').val(data.certificat);
                $('#dateCons').val(data.dateCons);

                $('#id').val(data.idCONSULTATION);

                $('#insert').val("Modifier");
                $('#ajoutC').modal('show');


            }

        });
    });

    /**Supprimer consultation**/

    $(document).on('click','.delete_data', function(){

        var id=$(this).attr("id");
        if(confirm("Voulez vous supprimer cette consultation?")){

            $.ajax({
                url:'suppCons.php',
                type: 'POST',
                data:{
                    ids:id
                },
                success: function(result){
                    if(result.trim() == "success")
                        window.location.reload();
                    else alert(result.trim());

                }
            });



        }

    });


</script>
<script>
    /*****************************ajouter exmen***************************************************/

    $('#ajout1').click(function () {
        $('#insertE').val("Valider");
        $('#insert_formE')[0].reset();
    });
    /*************************MODIFIER EXAMEN     ************************/

    $(document).on('click', '.edit_data1', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "AffichModifierExam.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                //remplir les cases avec les anciens données
                $('#dateExamen').val(data.dateExamen);
                $('#typeE').val(data.typeE);
                $('#resultatExamen').val(data.resultatExamen);
                $('#fichierExam').val(data.fichierExam);

                $('#insert_formE #id').val(data.idEXAMEN);

                $('#insertE').val("Modifier");
                $("#examSubmitButton").val("Modifier");
                $('#ajoutE').modal('show');


            }

        });
    });

    $(document).on('click','.delete_data1', function(){

        var id=$(this).attr("id");
        if(confirm("Voulez vous supprimer cet examen?")){

            $.ajax({
                url:'suppExam.php',
                type: 'POST',
                data:{
                    ids:id
                },
                success: function(result){
                    if(result.trim() == "success")
                        window.location.reload();
                    else alert(result.trim());

                }
            });



        }

    });

</script>

<script>
    $('#ajout2').click(function () {
        $('#insertO').val("Valider");
        $('#insert_formO')[0].reset();
    });

    $(document).on('click', '.edit_dataO', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "AffichModifierOccup.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                //remplir les cases avec les anciens données
                $('#dateD').val(data.dateD);
                $('#dateF').val(data.dateF);
                $('#lit').val(data.lit);


                $('#insert_formO #id').val(data.idOCCUPATION);

                $('#insertO').val("Modifier");
                $("#occupSubmitButton").val("Modifier");
                $('#ajoutO').modal('show');


            }

        });
    });

    $(document).on('click','.delete_dataO', function(){

        var id=$(this).attr("id");
        if(confirm("Voulez vous supprimer cette occupation?")){

            $.ajax({
                url:'suppOccup.php',
                type: 'POST',
                data:{
                    ids:id
                },
                success: function(result){
                    if(result.trim() == "success")
                        window.location.reload();
                    else alert(result.trim());

                }
            });



        }

    });

</script>

</body>

</html>
