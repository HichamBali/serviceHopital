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
     <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
      
      
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
            <a class="nav-link js-scroll-trigger" href="#skills">Hospitalisation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../home.php">Back</a>
          </li>
          
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h3 class="mb-0"><?php echo $resultat['nom_p']?>
            <span class="text-primary"><?php echo $resultat['prenom_p']?></span>
          </h3>
          <div class="subheading mb-5">3542 Berry Street · Cheyenne Wells, CO 80810 · (317) 585-8468 ·
            <a href="mailto:name@email.com">name@email.com</a>
          </div>
          <p class="mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</p>
          <ul class="list-inline list-social-icons mb-0">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
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
       <th>Oorientation</th>
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
              
              <div>
             
              </div>
          </div>
        

        </div>
          </div>
      </section>
     
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
          <h2 class="mb-5">Education</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">University of Colorado Boulder</h3>
              <div class="subheading mb-3">Bachelor of Science</div>
              <div>Computer Science - Web Development Track</div>
              <p>GPA: 3.23</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">August 2006 - May 2010</span>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">James Buchanan High School</h3>
              <div class="subheading mb-3">Technology Magnet Program</div>
              <p>GPA: 3.56</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">August 2002 - May 2006</span>
            </div>
          </div>

        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
          <h2 class="mb-5">Skills</h2>

          <div class="subheading mb-3">Programming Languages &amp; Tools</div>
          <ul class="list-inline list-icons">
            <li class="list-inline-item">
              <i class="devicons devicons-html5"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-css3"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-javascript"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-jquery"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-sass"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-less"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-bootstrap"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-wordpress"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-grunt"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-gulp"></i>
            </li>
            <li class="list-inline-item">
              <i class="devicons devicons-npm"></i>
            </li>
          </ul>

          <div class="subheading mb-3">Workflow</div>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-check"></i>
              Mobile-First, Responsive Design</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Cross Browser Testing &amp; Debugging</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Cross Functional Teams</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Agile Development &amp; Scrum</li>
          </ul>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
          <h2 class="mb-5">Interests</h2>
          <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skiier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
          <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technolgy advancements in the front-end web development world.</p>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
          <h2 class="mb-5">Awards &amp; Certifications</h2>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              Google Analytics Certified Developer</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              Mobile Web Specialist - Google Certification</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              1<sup>st</sup>
              Place - University of Colorado Boulder - Emerging Tech Competition 2009</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              1<sup>st</sup>
              Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              2<sup>nd</sup>
              Place - University of Colorado Boulder - Emerging Tech Competition 2008</li>
            <li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              1<sup>st</sup>
              Place - James Buchanan High School - Hackathon 2006</li>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              3<sup>rd</sup>
              Place - James Buchanan High School - Hackathon 2005</li>
          </ul>
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

  <h4>Formulaire Consultation!</h4>
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
            <input class="formBtn" type="reset2" />


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
            if(confirm("Would you delete this consultation")){
                
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
