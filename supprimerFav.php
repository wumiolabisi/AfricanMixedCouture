<?php 
$dsn ="mysql:dbname=africanmixedcouture;host=localhost";
$username="root";
$passwd="";   

$pdo = new PDO($dsn, $username, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$idFavoris = $_GET['idFav'];	   
$requeteSuppression = $pdo ->query("DELETE from favoris WHERE id_favoris = $idFavoris ");
$resultatRrequeteSuppression = $requeteSuppression->fetchAll(PDO::FETCH_ASSOC);

  
  $i = 0;
  while($i!=1){
  
header('Location:favoris.php');
  $i++;
  
  }

?>
