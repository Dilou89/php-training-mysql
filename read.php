<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <h1>Liste des randonnées</h1>
  <table border='1' >
   <tr>
     <td>Name</td>
     <td>Difficulty</td> 
     <td>Distance</td>
     <td>Duration</td>
     <td>Height_difference</td>
   </tr>
   <!-- Afficher la liste des randonnées -->
   <?php
   try{
    $connect=new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8','root','root');
    $result=$connect->query("SELECT * FROM hiking");
    $result->setFetchMode(PDO::FETCH_OBJ);
    while( $rand=$result->fetch()){

      echo '<td><a href=update.php?id='.$rand->id.' >'.$rand->name.'</a></td>'
      .'<td>'.$rand->difficulty.'</td>'
      .'<td>'.$rand->distance.'</td>'
      .'<td>'.$rand->duration.'</td>'.'<td>'.$rand->height_difference.'</td>' ?> </tr>
      <?php
    }

    $dbh=null;

  } catch(PDOException $e){
    print "Erreur !:".$e->getMessage()."<br/>";
    die();
  }
  ?>

</table>
</body>
</html>
