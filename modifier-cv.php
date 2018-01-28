<?php 
include('connexion.php'); /* Import du fichier de connexion à la base de données [db_cvs]*/ 
$msg="";
	if (isset($_POST['btnValider'])){

if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])) {
		$sql= "UPDATE codeuses SET nom='".mysqli_real_escape_string($link,$_POST['nom'])."',
			     prenoms='".mysqli_real_escape_string($link,$_POST['prenoms'])."',
				datnaiss='".$_POST['datnaiss']."',
		  specialisation='".mysqli_real_escape_string($link,$_POST['specialisation'])."',
				  resume='".$_POST['resume']."',
				   email='".$_POST['email']."',
			   telephone='".$_POST['telephone']."',
				     mdp='".$_POST['mdp']."',
				   photo='".$_FILES['photo']['name']."')";
	}
 }

      if (isset($_GET['id'])){
		$update="SELECT * FROM codeuses WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

 ?>

 <!DOCTYPE HTML>
   <html lang="en">
   <head>
      <meta charset="utf-8"> 
      <meta name="description" content="formulaire Inscription"> 
      <meta name="keywords" content="admin"> 
      <meta name="author" content="Inscription"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
      <meta name="viewport" content="width=device=width, initial-scale=1.0"> 

   <!--  ****  liens bootstrap | fonts (polices) | feuilles de styles css  **** -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/inscription.css">

    <!--   ****  Insertion des bibliothèques javascript  ****  -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

      <title>Inscrivez-vous</title>
   </head>
   <body>  

   	<header>
			<?php include 'bar-menu.php'; ?> 
		</header>

		<div class="container-signup">
			<div class="row">
				<div class="col-md-4"> </div>
				<div class="col-md-4 well">

					<form action="" class="signupform" method="POST" role="form" enctype="multipart/form-data">
						<legend>Modifier votre CV</legend>

                  <div class="form-group">
							<label for="">Nom</label>
							<input name="nom" type="text" class="form-control" id="" placeholder="Entrer votre nom">
						</div>

						<div class="form-group">
							<label for="">Prenoms</label>
							<input name="prenoms" type="text" class="form-control" id="" placeholder="Entrer votre prenom">
						</div>

						<div class="form-group">
							<label for="">Date de naissance</label>
							<input name="datnaiss" type="date" class="form-control" id="" placeholder="jj/mm/aaaa">
						</div>

						<div class="form-group">
							<label for="">Specialisation</label>
							<input name="specialisation" type="text" class="form-control" id="" placeholder="Entrer votre specialisation">
						</div>

						<div class="form-group">
							<label for="">Resume</label>
							<textarea name="resume" rows="" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<label for="">Email*</label>
							<input name="email" type="email" class="form-control" id="" placeholder="aichagyeo@gmail.com" required>
						</div>

						<div class="form-group">
							<label for="">telephone</label>
							<input name="telephone" type="text" class="form-control" id="">
						</div>

                  <div class="form-group">
							<label for="">Mot de passe*</label>
							<input name="mdp" type="password" class="form-control" id="" placeholder="Entrer un mot de passe" required>
						</div> 

						<div class="form-group">
							<label for="">photo</label>
							<input name="photo" type="file" class="form-control" id="">
						</div>

						<a href="?id=<?php echo $dataU['id']; ?>"><button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block"> 
							Modifier
						</button></a>

							

					</form>
					
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>

	</body>

</HTML>