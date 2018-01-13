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

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

    <script src="js/jquery-3.2.1.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.2.1.js"></script> c'est le même-->


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
                <a class="nav-link js-scroll-trigger" href="home.php">retour</a>
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
            <h2 class="mb-5">Consultation</h2>
            <div class="col-md-2" >
                <button type="button" name="ajout" id="addcons"  class="btn btn-success btn-md edit_data btn-block">ajouter</button>
            </div>
            <br>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">



                <div class="table-responsive">
                    <table id="hello" class="table table-bordered ">
                        <thead style="background:white;">
                        <tr>
                            <th style="display:none">id</th>
                            <th>Rapport</th>
                            <th>Ordonnance</th>
                            <th>Orientation</th>
                            <th>Certifica</th>
                            <th>Date de consultation</th>

                        </tr>
                        </thead>
                        <tbody>

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
       <td><input type="button" name="edit" value="Modifier" id="'.$row["idCONSULTATION"].'"
                                       class="btn btn-info btn-md edit_data btn-block"/></td>
           <td><input type="button" name="delete" value="Supprimer" id="'.$row["idCONSULTATION"].'"
                                       class="btn btn-danger btn-md delete_data btn-block"/></td>

    
       
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

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">

        <div class="my-auto">
            <h2 class="mb-5">Examen</h2>
            <div class="col-md-2" >
                <button type="button" name="ajout" id="addcons"  class="btn btn-success btn-md edit_data btn-block">ajouter</button>
            </div>
            <br>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">



                <div class="table-responsive">
                    <table id="hello" class="table table-bordered ">
                        <thead style="background:white;">
                        <tr>
                            <th style="display:none">id</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Resultat</th>
                            <th>Fichier</th>

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
       
       <td><input type="button" name="edit" value="Modifier" id="'.$row["idEXAMEN"].'"
                                       class="btn btn-info btn-md edit_data btn-block"/></td>
           <td><input type="button" name="delete" value="Supprimer" id="'.$row["idEXAMEN"].'"
                                       class="btn btn-danger btn-md delete_data btn-block"/></td>

    
       
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

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 class="mb-5">Occupation</h2>
            <div class="col-md-2" >
                <button type="button" name="ajoutO" id="addoccup"  class="btn btn-success btn-md edit_data btn-block">ajouter</button>
            </div>
            <br>

            <div class="resume-item d-flex flex-column flex-md-row mb-5">



                <div class="table-responsive">
                    <table id="hello" class="table table-bordered ">
                        <thead style="background:white;">
                        <tr>
                            <th style="display:none">id</th>
                            <th>Date de début </th>
                            <th>Date de fin</th>
                            <th>N° lit</th>



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
       <td>'.$row["lit"].'</td>
       <td><input type="button" name="edit" value="Modifier" id="'.$row["idOCCUPATION"].'"
                                       class="btn btn-info btn-md edit_data btn-block"/></td>
           <td><input type="button" name="delete" value="Supprimer" id="'.$row["idOCCUPATION"].'"
                                       class="btn btn-danger btn-md delete_data btn-block"/></td>

    
       
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





<!-- Bootstrap core JavaScript -->

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->

<!-- Custom scripts for this template -->
<script src="js/resume.min.js"></script>





<div id="consultation">

    <h4>Formulaire Consultation</h4>
    <small>Remplire tout les données nécessaire </small>

    <form  class="form">

        <input placeholder="rapport" id="rapport" type="text"  required />
        <textarea placeholder="oridentation" id="oridentation" type="text" required></textarea>
        <textarea placeholder="certifcat" id="certifcat" type="text" required></textarea>
        <textarea placeholder="Ordonnance" id="ordonnace" required></textarea>
        <input placeholder="dateCons" id="dateCons" type="date" required />
        <input class="formBtn"  id="validerAdd"  type="button" value="valider">
        <input class="formBtn" type="reset" />


    </form>
</div>

<div id="modifierConsult">

    <h4>Formulaire Consultation!</h4>
    <small>Modifier tout les données nécessaire </small>

    <form  class="form">

        <input placeholder="rapport" id="rapport2" type="text"  required />
        <textarea placeholder="oridentation" id="oridentation2" type="text" required></textarea>
        <textarea placeholder="certifcat" id="certifcat2" type="text" required></textarea>
        <textarea placeholder="Ordonnance" id="ordonnace2" required></textarea>
        <input placeholder="dateCons" id="dateCons2" type="date" required />
        <input class="formBtn"  id="validerAdd2"  type="button" value="valider">
        <input class="formBtn" type="reset" />


    </form>
</div>

<script>
    $(function() {

        // contact form animations
        $('#addcons').click(function() {
            $('#consultation').fadeToggle();
        })
        $(document).mouseup(function (e) {
            var container = $("#consultation");

            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                container.fadeOut();
            }
        });

    });


</script>
<script>


    $('#validerAdd').on('click', function(){
        $.ajax({
            url:'ajoutConsult.php',
            type: 'POST',
            data:{
                rapprot: $('#rapport').val(),
                ordonnace: $('#ordonnace').val(),
                oridentation: $('#oridentation').val(),
                certifcat: $('#certifcat').val(),
                dateCons: $('#dateCons').val()
            },
            success: function(result){
                if(result.trim() == "success")
                    window.location.reload();
                else alert('error');

            }
        });


    });



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
<style>

    .formBtn {
        width: 140px;
        display: inline-block;
        line-height: 2px;
        background: #03a9f3;
        border: 1px solid #03a9f3;
        color: #fff;
        font-weight: 100;
        font-size: 1.2em;
        border: none;
        height: 30px;
    }


    #contactForm {
        display: none;
        z-index: 9999999;
        border: 6px solid #03a9f3;
        padding: 2em;
        width: 650px;
        text-align: center;
        background: #fff;
        position: fixed;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%)

    }



    #consultation,#modifierConsult {
        display: none;
        z-index: 9999999;
        border: 6px solid #03a9f3;
        padding: 2em;
        width: 650px;
        text-align: center;
        background: #fff;
        position: fixed;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%)

    }

    input, textarea {
        margin: .8em auto;
        font-family: inherit;
        text-transform: inherit;
        font-size: inherit;

        display: block;
        width: 580px;
        padding: .4em;
    }
    textarea { height: 80px; resize: none; }


</style>
</body>

</html>
