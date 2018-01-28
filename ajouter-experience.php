<!-- Code -->
<?php include('connexion.php');
	$msg="";
	if (isset($_POST['btnValider'])){

			if (isset($_GET['id'])){
				$sql="UPDATE experiences SET 
				organisation='".mysqli_real_escape_string($link,$_POST['organisation'])."',
				posteoccupeposte='".mysqli_real_escape_string($link,$_POST['posteoccupe'])."',
					 description='".$_POST['description']."',
				datedebut='".mysqli_real_escape_string($link,$_POST['datedebut'])."',
				datefin='".$_POST['datefin']."',
				id_codeuses='".$_POST['codeuses']."' 
				WHERE id=".$_GET['id'];
			}else{
				$sql= "INSERT INTO experiences
			 (organisation,posteoccupe,description,datedebut,datefin,id_codeuses)
			 VALUES ('".mysqli_real_escape_string($link,$_POST['organisation'])."',
			 	'".mysqli_real_escape_string($link,$_POST['posteoccupe'])."',
			 	'".$_POST['description']."',
			 	'".$_POST['datedebut']."',
			 	'".$_POST['datefin']."',
			 	id_codeuses='".$_POST['codeuses']."')";
			}                          	  
			 		 
		}

     if (isset($_GET['id'])){
		$update="SELECT * FROM experiences WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

	if (isset($_GET['sup'])){
		$delete="DELETE FROM experiences WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
		$msg='element supprime' ;
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

		<title>Ajouter experience</title>
      </head>    

      <body> 
		<?php include('bar-menu.php');    ?>

		<br>
		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
	           		<div class="well">
						<form action="" method="POST" role="form" enctype="multipart/form-data">
							<h1>Ajouter une experience </h1>
						
							<div class="form-group">
								<label for="">organisation</label>
								<input name="organisation" type="text" class="form-control" id="" placeholder="Entrer votre organisation" value="<?php if (isset($_GET['id'])) echo $dataU['organisation']; ?>">
							</div>

							<div class="form-group">
								<label for="">poste occupe</label>
								<input name="posteoccupe" type="text" class="form-control" id="" placeholder="Entrer le posteoccupe" value="<?php if (isset($_GET['id'])) echo $dataU['posteoccupe']; ?>">
							</div>

							<div class="form-group">
								<label for="">description</label>
								<textarea name="description" rows="" class="form-control"></textarea>
							</div>

							<div class="form-group">
								<label for="">datedebut</label>
								<input name="datedebut" type="date" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if ( isset($_GET['id'])) echo $dataU['datedebut']; ?>" >
							</div>

							<div class="form-group">
								<label for="">datefin</label>
								<input name="datefin" type="date" class="form-control" id="" placeholder="jj/mm/aaaa" value="<?php if (isset($_GET['id'])) echo $dataU['datefin']; ?>">
							</div>
								
							<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">	
								Valider
							</button>
						</form>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
<br>

			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>organisation</th>
							<th>poste</th>
							<th>datedebut</th>
							<th>datefin</th>
							<th>Id_codeuses</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										organisation,
										posteoccupe,
										description,
										datedebut,
										datefin,
										codeuses.id,
									FROM experiences
									INNER JOIN codeuses
								  ON experiences.id = experiences.id_codeuses";
							$res= mysqli_query($link,$list);
	while ($dataU = mysqli_fetch_array($res)){
								
							
						 ?>	

						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $dataU['organisation']; ?></td>
							<td><?php echo $dataU['posteoccupe']; ?></td>
							<td><?php echo $dataU['datedebut']; ?></td>
							<td><?php echo $dataU['datefin']; ?></td>
							<td><?php echo $dataU['codeuses']; ?></td>
							
							<td>
								<a href="?id=<?php echo $dataU['id']; ?>"><button type="button" class="btn btn-primary">Modifier</button></a>

				                <a href="?sup=<?php echo $dataU['id']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
				            </td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>

			</div>
	</div>


		

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>


	</body>
</html>



