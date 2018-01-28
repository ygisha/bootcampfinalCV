<?php 
include('connexion.php'); /* Import du fichier de connexion à la base de données [db_cvs]*/ 
$msg="";
   if (isset($_POST['btnValider'])){

      if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])) {
      $sql= "INSERT INTO codeuses (nom,prenoms,datnaiss,specialisation,resume,email,telephone,mdp,photo) 
             VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."',
                     '".mysqli_real_escape_string($link,$_POST['prenoms'])."',
                     '".$_POST['datnaiss']."',
                     '".mysqli_real_escape_string($link,$_POST['specialisation'])."',
                     '".$_POST['resume']."',
                     '".$_POST['email']."',
                     '".$_POST['telephone']."',
                     '".$_POST['mdp']."',
                     '".$_FILES['photo']['name']."')";
            
      $res=mysqli_query($link,$sql);
      }
   }
 ?>

<!DOCTYPE HTML>
   <HTML lang="en">    
      <head>  
         <meta charset="utf-8"> 
      <meta name="description" content="accueil"> 
      <meta name="keywords" content="accueil"> 
      <meta name="author" content="accueil"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
      <meta name="viewport" content="width=device=width, initial-scale=1.0"> 

   <!--  ****  liens bootstrap | fonts (polices) | feuilles de styles css  **** -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/accueil.css">

    <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

      <title>Consulter cv</title>
      </head>    

      <body>  
  
      <?php include('bar-menu-dashboard.php');
      ?>
         
         <div class="container-fluid">
             <?php 
                  while ($data=mysqli_fetch_array($res)) {
               ?>

               <div class="row">
                  <div class="card col-sm-3">
                     <h3> <?php echo $data['nom'];  ?>
                          <?php echo $data['prenoms'];  ?>
                     </h3>
                     <h3> <?php echo $data['datnaiss'];  ?> </h3>
                     <h3> <?php echo $data['telephone'];  ?> </h3>
                     <h3> <?php echo $data['email'];  ?> </h3>
                  </div>
      
                  <div class ="col-sm-6">
                     <?php echo $data['resume'];  ?>
                  </div>

                  <div class ="col-sm-3">
                     <a href="#">
                        <img src="upload/<?php echo $data['photo'];  ?>" width="150px" height="150px" alt="">
                     </a>
                     <h4 class="titre2">
                        <?php echo $data['specialisation']; ?>  
                     </h4>
                     <div class="links">
                        <a href=""> <i class="fa fa-facebook"></i></a>
                        <a href=""> <i class="fa fa-twitter"></i></a>
                        <a href=""> <i class="fa fa-github"></i></a>
                     </div>
                  </div>  
                  <?php
                   } ?>
               </div>

               <br>
               <h2> Mes Experiences </h2>

         </div>

      </body>
</html>
