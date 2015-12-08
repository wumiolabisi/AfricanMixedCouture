<?php


//Connexion
if((isset($_POST['email'])) && (isset($_POST['motdepasse'])))
            {  
    
                $connexion = mysqli_connect("localhost", "root","","africanmixedcouture");
                $email = addslashes($_POST['email']);
                $mdp = addslashes($_POST['motdepasse']);
                $requete = "select * from utilisateur where email = '$email' and motdepasse = '$mdp' ";
                $result = mysqli_query($connexion, $requete);
                if (mysqli_num_rows($result)> 0){
                    
					?><script language="javascript">document.cookie="utilisateur=<?php echo $email?>";
												    document.location = "index.php";</script>
                  <?php
                    
                }
                else
                {
                    ?><script>alert("ERROR : Mauvais identifiant ou mot de passe.  Veuillez r�essayer");</script><?php
                }
				
				mysqli_close();
            }    

?>

<html>
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Index</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/myfile.js"></script>
		<script src="js/d3.v3.min.js"></script>
		<script>
		
//J'initialise une variable qui prend la valeur du cookie
//Si celui-ci est n'est pas vide alors je ne propose pas � l'utilisateur de se connecter
		
		var cookies = document.cookie;
	$(document).ready(  
			function(){

		if(cookies==""){
			$('<div class="input-group" id="connexion"><center>Connectez-vous pour avoir acc&egrave;s &agrave; vos favoris<p><form method="post"><input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email"><input type="password" class="form-control" placeholder="Mot de passe" aria-describedby="basic-addon1" name="motdepasse"><button type="submit" class="btn btn-default" value="Connexion">Connexion</button></form><a href="inscription.php">Ou inscrivez-vous</a></center></div>').appendTo('.menuvertical');
		}else{
			$('<div class="input-group" id="connexion"><center>Bienvenue !<p><a href="favoris.php">Voir la liste de mes favoris</a></center></div>').appendTo('.menuvertical');
		}		
	});
	
		</script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/mystyle.css" rel="stylesheet">


</head>
<body>
<div align="center">
<img src="img/banniere_transparente.png"/></div>

<!-- Menu horizontal dans lequel se trouve les rubriques --> 				
<nav class="menuhorizontal navbar">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  		
			<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			
			<li><a href="#" onclick="showCO();">A propos de Corinne Olabisi</a></li>
			
		<!-- Liste d�roulante -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&equiv; Cr&eacute;ations pour femmes</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick="showTops();">Tops</a></li>
            <li><a href="#" onclick="showCombi();">Combishort</a></li>
            <li><a href="#" onclick="showRobes();">Robes</a></li>
            <li><a href="#" onclick="showAF();">Accessoires</a></li>
          </ul>
        </li>
		
		<!-- Liste d�roulante -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&equiv; Cr&eacute;ations pour hommes</a>
          <ul class="dropdown-menu" role="menu">
			<li><a href="#" onclick="showAH();">Accessoires</a></li>
          </ul>
        </li>
		
		
		<li><a href="#" onclick="showEvent();">Ev&eacute;nements</a></li>

		<li><a href="#" onclick="showServices();">Services</a></li>


      </ul>
	  
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Mots-cl&eacute;s">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </form>

	  
    </div>
  </div>
</nav>

<div id="contenu">
<div class="menuvertical">
<!-- Ici se trouvera le menu vertical qui est diff�rent selon si le cookie est cr�� ou non -->
</div>

<div id="accueil">

Africamix devient ... <!-- La je mets un nouveau LOGO -->African and Mixed Couture !
D�couvrez ici toutes les nouvelles cr�ations de Corinne Olabisi, 
une styliste et une artiste qui m&eacute;lange son style unique avec son amour pour l'Afrique
</div>


<div id="CO" align="center">
A propos de Corinne Olabisi

Corinne Olabisi est   
</div>

<div id="tops" class="modalalignement">
<h2 align="center" class="titre2">Les tops</h2>

<?php

$dsn ="mysql:dbname=africanmixedcouture;host=localhost";
$username="root";
$passwd="";   

$pdo = new PDO($dsn, $username, $passwd);
$resultatCreation = $pdo ->query("SELECT creation.libelle,creation.id_creation,creation.description  FROM creation INNER JOIN categorie ON categorie.id_categorie = creation.idcategorie WHERE categorie.libelle = 'tops'");
$listeCreation = $resultatCreation->fetchAll(PDO::FETCH_ASSOC);

foreach($listeCreation as $value)
{
        $libelleCreation = $value['libelle'];
        $idCreation = $value['id_creation'];
		$descriptionCreation = $value['description'];

 
         ?> <h4> <?php echo $libelleCreation  ?></h4> <?php


$resultatPhoto = $pdo ->query("SELECT photo.chemin FROM photo INNER JOIN creation ON creation.id_creation = photo.idcreation AND photo.chemin LIKE '%1.jpg' WHERE creation.id_creation = $idCreation");
$listePhoto = $resultatPhoto->fetchAll(PDO::FETCH_ASSOC);

foreach($listePhoto as $value2)
{
        $cheminPhoto = $value2['chemin'];

 
         ?><!-- Declenchement du modal -->
<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal<?php echo $idCreation ?>"><img class="imagesmodals" src="<?php echo $cheminPhoto ?>"/></button>
<!-- Modal -->
<div id="myModal<?php echo $idCreation ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $libelleCreation ?></h4>
      </div>
      <div class="modal-body">
       <?php
	   
	   
$resultatPhoto2 = $pdo ->query("SELECT photo.chemin FROM photo INNER JOIN creation ON creation.id_creation = photo.idcreation WHERE creation.id_creation = $idCreation");
$listePhoto2 = $resultatPhoto2->fetchAll(PDO::FETCH_ASSOC);
	   
	  

foreach($listePhoto2 as $value3)
{
        $cheminPhoto2 = $value3['chemin'];

?>

<img class="images" src="<?php echo $cheminPhoto2?>"/>
<?php  }?>  	  <h4><?php echo $descriptionCreation ?></h4>
 
      </div>

      <div class="modal-footer"">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Favoris</button>

	 </div>
    </div>

  </div>
</div>
          
       <?php
	     
	   
   }  
	}
	
	 

?>
</div>

<div id="combishort">
<h2 align="center">Les combinaisons short et ensembles short</h2>
</div>

<div id="robes">
<h2 align="center">Les robes</h2>
</div>

<div id="accessoiresf">
<h2 align="center">Les accessoires - pour femmes</h2>
</div>

<div id="accessoiresh">
<h2 align="center">Les accessoires - pour hommes</h2>
</div>
<div id="event">
<h2 align="center">Ev&eacute;nements</h2>
<img src="img/menuevenement.png"/>
</div>
<div id="services">
<h2 align="center">Services et Tarifs</h2>
</div>

</div>

    </body>
</html>
