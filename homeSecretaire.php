<!DOCTYPE html>
<?php
session_start();
if(empty($_SESSION['user']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location:login.html');
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Dashboard Template (Sidebar icons animated) - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="home.css"/>
    <link rel='stylesheet prefetch' href='http://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css'>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>

</head>
<body>

<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a><!--ici j'ajoute logo-->
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Secrétaire <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="logOut.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                        <!--<li><a href="#"><i class="fa fa-user-secret"></i> Mon Profile</a></li>-->
                        <li><a href="#"><i class="fa fa-unlock-alt"></i> Changer Mot de passe</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!-- /container -->
</div>

<!-- /Header -->

<!-- Main -->

<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">

        <!--le menu de side-bar.. contient médecin,patients,infirmer,occupation avec des sous menu ajouter/modifier/supp..-->

        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-0"><i class="fa fa-dashboard"></i> Tableau de bord</a>
        </li>

        <li>
            <a href="listePatient.php" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-user"></i> Patient <!--<i class="fa fa-fw fa-angle-down pull-right"></i>--></a>
            <!--<ul id="submenu-3" class="nav collapse">
                <li><a href="#"><i class="fa fa-users"></i> Liste patient</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i> Ajouter patient</a></li>
                <li><a href="#"><i class="fa fa-edit"></i> Modifier patient</a></li>
                <li><a href="#"><i class="fa fa-user-times"></i> Supprimer patient</a></li>
            </ul>-->
        </li>
        <li>
            <a href="listeMedecin.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user-md"></i> Médecin </a>
        </li>
        <li>
            <a href="listeInfirmier.php" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-medkit"></i> Infirmier </a>

        </li>
        <li>
            <a href="listeSecretaire.php" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-user"></i> Secrétaire </a>
        </li>

        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-calendar"></i> Rendez-vous </a>
        </li>

        <li>
            <a href="chambre.php" data-toggle="collapse" data-target="#submenu-6"><i class="fa fa-hotel"></i> Chambre / Lit </a>
        </li>

    </ul>
</div>


<script type="text/javascript">
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $(".side-nav .collapse").on("hide.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
        });
        $('.side-nav .collapse').on("show.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
        });
    })
</script>
<!--
</body>
</html>
-->