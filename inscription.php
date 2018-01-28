<?php 
include('connexion.php'); /* Import du fichier de connexion à la base de données [db_cvs]*/ 
$msg="";
	if (isset($_POST['btnValider'])){

		if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])) {
			$sql="UPDATE codeuses SET 
				nom='".mysqli_real_escape_string($link,$_POST['nom'])."',
				prenoms='".mysqli_real_escape_string($link,$_POST['prenoms'])."',
				datnaiss='".$_POST['datnaiss']."',
		  specialisation='".mysqli_real_escape_string($link,$_POST['specialisation'])."',
				  resume='".$_POST['resume']."',
				   email='".$_POST['email']."',
			   telephone='".$_POST['telephone']."',
				     mdp='".$_POST['mdp']."',
				   photo='".$_FILES['photo']['name']."')";
		}else{
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
		}
				
	 }

 if (isset($_GET['id'])){
		$update="SELECT * FROM codeuses WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM codeuses WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
		$msg='element supprime' ;
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
						<legend>Inscription</legend>

                  <div class="form-group">
							<label for="">Nom</label>
							<input name="nom" type="text" class="form-control" id="" placeholder="Entrer votre nom" value="<?php if (isset($_GET['id'])) echo $dataU['nom']; ?>">
						</div>

						<div class="form-group">
							<label for="">Prenoms</label>
							<input name="prenoms" type="text" class="form-control" id="" placeholder="Entrer votre prenom" value="<?php if (isset($_GET['id'])) echo $dataU['prenoms']; ?>">
						</div>

						<div class="form-group">
							<label for="">Date de naissance</label>
							<input name="datnaiss" type="date" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset($_GET['id'])) echo $dataU['datnaiss']; ?>">
						</div>

						<div class="form-group">
							<label for="">Specialisation</label>
							<input name="specialisation" type="text" class="form-control" id="" placeholder="Entrer votre specialisation" value="<?php if (isset($_GET['id'])) echo $dataU['specialisation']; ?>">
						</div>

						<div class="form-group">
							<label for="">Resume</label>
							<textarea name="resume" rows="" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['resume']; ?>"></textarea>
						</div>

						<div class="form-group">
							<label for="">Email*</label>
							<input name="email" type="email" class="form-control" id="" placeholder="aichagyeo@gmail.com" value="<?php if (isset($_GET['id'])) echo $dataU['email']; ?>" required>
						</div>

						<div class="form-group">
							<label for="">telephone</label>
							<input name="telephone" type="text" class="form-control" id="" value="<?php if (isset($_GET['id'])) echo $dataU['telephone']; ?>">
						</div>

                  		<div class="form-group">
							<label for="">Mot de passe*</label>
							<input name="mdp" type="password" class="form-control" id="" placeholder="Entrer un mot de passe" value="<?php if (isset($_GET['id'])) echo $dataU['mdp']; ?>" required>
						</div> 

						<div class="form-group">
							<label for="">photo</label>
							<input name="photo" type="file" class="form-control" id="">
						</div>

						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block"> 
							Valider
						</button>	

					</form>
					
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>nom</th>
							<th>prenoms</th>
							<th>date naissance</th>
							<th>specialisation</th>
							<th>resume</th>
							<th>email</th>
							<th>telephone</th>
							<th>mot de passe</th>
							<th>photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										noms,
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
							while ($data = mysqli_fetch_array($res)){	
							
						 ?>	

					<tr>
						<td> <?php echo $n; ?> </td>
						<td><?php echo $data['nom']; ?></td>
						<td><?php echo $data['prenoms']; ?></td>
						<td><?php echo $data['datnaiss']; ?></td>
						<td><?php echo $data['specialisation']; ?></td>
						<td><?php echo $data['resume']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['telephone']; ?></td>
						<td><?php echo $data['mdp']; ?></td>
						<td><?php echo $data['photo']; ?></td>
						<td><img src="upload/<?php echo $data['image'];  ?>" width="30px" height="30px" alt=""></td>
						
						<td>
							<a href="?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-primary">Modifier</button></a>

			                <a href="?sup=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
			            </td>
					</tr>
					<?php $n++;
					 } ?>
				</tbody>
			</table>

			</div>

		</div>

	</body>

</HTML>