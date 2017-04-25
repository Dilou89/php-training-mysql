<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<h1>Corriger</h1>
<form action="" method="post">
	<body>
		<a href="read.php">Liste des données</a>
	</body>
	</html>
	<div>
		<label for="name">Name</label>
		<input type="text" name="name" value="">
	</div>

	<div>
		<label for="difficulty">Difficulté</label>
		<select name="difficulty">
			<option value="très facile">Très facile</option>
			<option value="facile">Facile</option>
			<option value="moyen">Moyen</option>
			<option value="difficile">Difficile</option>
			<option value="très difficile">Très difficile</option>
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
	<button type="button" name="button">Envoyer</button>
</form>
<?php
$id= $_GET['id'];


try {
	$connect=new PDO('mysql:host=localhost;dbname=reunion_island','root','root');
}
catch(PDOException $e){
	print "Erreur !:".$e->getMessage()."<br/>";
	die();
}
$result=$connect->query("SELECT * FROM hiking WHERE id ='$id'");
$result->setFetchMode(PDO::FETCH_OBJ);
while( $rand=$result->fetch()){

	echo    $rand->name.'<br/>'
	.$rand->difficulty.'</br>'
	.$rand->distance.'</br>'
	.$rand->duration.'</br>'
	.$rand->height_difference ; }


	$req = $connect->prepare('UPDATE hiking SET
		name = :nv_name,
		difficulty = :nv_difficulty,
		distance = :nv_distance,
		duration = :nv_duration,
		height_difference = :nv_height_difference
		WHERE id = :id ');



	$corr=$req->execute(array(
		':nv_name' => $_POST['name'],
		':nv_difficulty' => $_POST['difficulty'],
		':nv_distance' => $_POST['distance'],
		':nv_duration' => $_POST['duration'],
		':nv_height_difference' => $_POST['height_difference'],
		));
		?>
