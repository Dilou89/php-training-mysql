<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="POST">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="Essai">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="tres facile">Tres facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="tres difficile">Tres difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>

	<?php
	
	try {
		$connect=new PDO('mysql:host=localhost;dbname=reunion_island','root','root');
	}
	catch(PDOException $e){
		print "Erreur !:".$e->getMessage()."<br/>";
		die();
	}

	$name=$_POST['name'];
	$difficulty=$_POST['difficulty'];
	$distance=(int)$_POST['distance'];
	$duration=(int)$_POST['duration'];
	$height_difference=(int)$_POST['height_difference'];
	$rand = $connect->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (:name, :difficulty, :distance, :duration, :height_difference);" );


	$result = $rand->execute(array(':name' => $name,
		':difficulty' => $difficulty,
		':distance' =>$distance,
		':duration' =>$duration,
		':height_difference'=>$height_difference,
		));
	if ($result === true){
		echo "<script>alert('La randonnée a été ajoutée avec succès')</script>";


	}
	?>





	</html>
