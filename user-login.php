<?php
include('connexion.php'); /* Import du fichier de connexion à la base de données [db_cvs]*/ 

 if (isset($_POST['btnValider']) ) {
		$sql="SELECT * FROM codeuses WHERE email='".($_POST['email'])."' AND mdp='".($_POST['mdp'])."'"; 
		$req = mysqli_query($link,$sql);
	} 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<meta name="description" content="user login"> 
		<meta name="keywords" content="user login"> 
		<meta name="author" content="user login"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta name="viewport" content="width=device=width, initial-scale=1.0"> 

	<!--  ****  liens bootstrap | fonts (polices) | feuilles de styles css  **** -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/user-login.css">

    <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

		<title>Login</title>
	</head>
	<body>

		<header>
			<?php include 'bar-menu.php'; ?> 
		</header>

		<div class="container-form">

			<div class="row">
				<div class="col-md-4"> </div>
				<div class="col-md-4 connect">
		
					<form action="" method="POST" role="form" class="form-connect">
						<legend>Connectez-vous</legend>
					
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" id="" placeholder="aichagyeo@gmail.com">
						</div>

						<div class="form-group">
							<label for="">Mot De Passe</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="">
						</div>

						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block"> 	
							Valider
						</button>
					</form>

				</div>
			</div>
			<div class="col-sm-1"></div>		
		</div>




		
	</body>
</html>