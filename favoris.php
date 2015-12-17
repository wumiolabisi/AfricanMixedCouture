 	<script>
	
	
	$(document).ready(  
			function(){

		if(cookies==""){
		alert('Vous n''êtes pas connecté(e) ! Connectez-vous ou inscrivez-vous pour créer votre liste de favoris');
		document.location('index.php');
		}
	});
	
		</script>
 <html>
     <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Favoris</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/myfile.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/mystyle.css" rel="stylesheet">


</head>
<body>
<center>
<div align="center">
<img src="img/banniere_transparente.png" height="500" width="700"/></div>

 <div id="contenu">
 
 
 <div class="menuhorizontal">
  <h3 align="center">Vos favoris</h3>

<center>Bienvenue  dans la liste de vos favoris
 <p>
 Vous pouvez poursuivre et acheter les créations en cliquant sur le bouton "Acheter sur Alittlemarket.com" ou supprimez les éléments que vous avez mis en favoris
<p> <a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
 <p>
 <a href="deconnexion.php">Me déconnecter</a></center>
 
 </div>
 
 
 
 
<center>
<?php
$dsn ="mysql:dbname=africanmixedcouture;host=localhost";
$username="root";
$passwd="";   

$pdo = new PDO($dsn, $username, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(isset($_GET['insertion'])){
$insertion = $_GET['insertion'];

if($insertion==1){
$idCrea = $_GET['idCrea'];
$idUser = $_GET['idUti'];

$i = 0;
$resultatInsertion= $pdo ->query("insert into favoris (idutilisateur,idcreation) VALUES ('$idUser', '$idCrea')");
while($i!=1){

header('Location:favoris.php?idUser='.$idUser);

$i++;

}
}
}

if(isset($_COOKIE['idUtilisateur'])){

$idUser = $_COOKIE['idUtilisateur'];
}

$resultatFav = $pdo ->query("SELECT creation.libelle,creation.id_creation,creation.urlachat FROM creation INNER JOIN favoris ON favoris.idcreation = creation.id_creation WHERE favoris.idutilisateur = $idUser");
$listeFav = $resultatFav->fetchAll(PDO::FETCH_ASSOC);

foreach($listeFav as $value)
{
        $libelleCreationFav = $value['libelle'];
        $idCreationFav = $value['id_creation'];
		$urlCreationFav = $value['urlachat'];

 
         ?> <div class="libelle"><h5> <?php echo $libelleCreationFav  ?></h5>
		 <?php
$resultatPhotoFav = $pdo ->query("SELECT photo.chemin FROM photo INNER JOIN creation ON creation.id_creation = photo.idcreation AND photo.chemin LIKE '%1.jpg' WHERE creation.id_creation = $idCreationFav");
$listePhotoFav = $resultatPhotoFav->fetchAll(PDO::FETCH_ASSOC);

foreach($listePhotoFav as $value2)
{
        $cheminPhotoFav = $value2['chemin'];

         ?>
<img class="images" src="<?php echo $cheminPhotoFav ?>"/><br>
<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.open('<?php echo $urlCreationFav ?>');">Acheter sur AlittleMarket.com <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
</div>
<?php
	 
		} 
		 }
?>
 </center>
 </div>
</body>
</html>