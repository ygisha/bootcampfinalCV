<?php 
include('connexion.php');
?>

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

		<title>Accueil</title>
	</head>

	<body>

		<header>
			<?php include 'bar-menu.php'; ?> 
		</header>
			<br>
	      <div class="container">
         <?php 
                  $n=1;
                  $list=" SELECT 
                           id,
                           nom,
                           prenoms,
                           datnaiss,
                           specialisation,
                           resume,
                           email,
                           telephone,
                           mdp,
                           photo
                        FROM codeuses";
                  $res= mysqli_query($link,$list);                    
         ?>
             	
         <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">

               <?php 
                  while ($data=mysqli_fetch_array($res)) {
               ?>

                  <div class="well">
                   	<div class="row">
                     	<div class="col-sm-3 titre">
                       		<img src="upload/<?php echo $data['photo'];  ?>" width="150px" height="150px" alt="" style="border-radius: 50%;">	
                       		<h4 class="titre2">
                       			<?php echo $data['nom']; ?> 
                       			<?php echo $data['prenoms']; ?> 
                       		</h4>
                     	</div>

                     	<div class="col-sm-6 contenu">
                       		<h3><?php echo $data['specialisation']; ?></h3>
                       		<p> <?php echo $data['resume'];  ?> </p> 
                     	</div>

                     	<div class="col-sm-2">
                     		<br>
                       		<a href="consultercv.php?id=<?php echo $datacat['id']; ?>">
                              <span class="badge bouton"> Consultez le cv </span>
                           </a>
                     	</div>
                     </div>
                    <br>
                  </div>
   <?php
         } ?>
      		</div>
    		</div>
  		</div>

      </body>
 </html>