 <!DOCTYPE HTML>
   <HTML lang="en">    
     <head>
		<meta charset="utf-8"> 
		<meta name="description" content="menu"> 
		<meta name="keywords" content="menu"> 
		<meta name="author" content="menu"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta name="viewport" content="width=device=width, initial-scale=1.0"> 

	<!--  ****  liens bootstrap | fonts (polices) | feuilles de styles css  **** -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/bar-menu.css">

    <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

		<title>Barre de menu</title>
	</head>

   <body>
   <!-- Bannière de logo et menu de la page-->
      <nav class="menu navbar navbar-default navbar-static-top"> 
         <div class="container"> 
            <div class="menu-head navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>

            </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=" main-menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="menu-title nav navbar-nav">
                 <li><a href="#"> SHEISTHECODE CV <span class="sr-only">(current)</span></a></li>
               </ul>

               <ul class="menu-droit nav navbar-nav navbar-right">
                   <!-- afficher avec php echo le nom du user -->
                  <li><a href="accueil.php"> A propos </a></li>
                  <li><a href="inscription.php"> S'inscrire </a></li>
                  <li><a href="user-login.php"> Se connecter </a></li>
               </ul>
            </div><!-- /.navbar-collapse -->
         </div>
      </nav>

      </body>
 </html>

