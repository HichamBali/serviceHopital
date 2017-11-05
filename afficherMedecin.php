<!DOCTYPE html>
<html>
<head>
    <link charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <link href='https://fonts.googleapis.com/css?family=open+sans' rel="stylesheet" type="text/css">

    <script language="javascript">
        a = 10;

        function affichage() {
            document.getElementById("insert").innerHTML = "";

            var req = new XMLHttpRequest();
            req.onreadystatechange = function () {

                if (req.readyState == 4 && req.status == 200) {

                    document.getElementById("insert").innerHTML = req.responseText;
                }
            }

            req.open("GET", "afficherMedecinAjax.php?n=" + a, true);

            req.send();

            a = a + 10;

        }
    </script>

</head>

<body>
<?php
include 'secretaire.html';
?>
<nav>
    <button>Ajouter un medecin</button>
</nav>
<div>
    <table id="insert" style="overflow-x:auto;" cellspacing="15" cellpadding="25">

        <?php

        try {
            $dbh = new PDO('mysql:host=localhost;dbname=service', 'root', '');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $number = $dbh->query("SELECT * FROM medecin LIMIT 0,10");
            $number->execute();


            echo '<tr><td>Nom </td><td> Prenom</td><td> Adresse</td><td>Grade</td><td>Specialite</td><td>Telephone</td></tr>';
            for ($i = 0; $row = $number->fetch(); $i++) {

                echo
                    '<tr>' .
                    '<td>' . $row['nom_m'] . '</td>' .
                    '<td>' . $row['prenom_m'] . '</td>' .
                    '<td>' . $row['adresse_m'] . '</td>' .
                    '<td>' . $row['grade_m'] . '</td>' .
                    '<td>' . $row['specialite_m'] . '</td>' .
                    '<td>' . $row['numTel_m'] . '</td>' .
                    '</tr>';

            }
        } catch (PDOException $e) {
            die("erreur de connexion" . $e->getMessage());
        }


        ?>

    </table>
</div>


<br>
<center><a href="#" onclick="affichage()">Suivant</a></center>

</body>

</html>
