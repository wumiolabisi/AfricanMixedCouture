<html>
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Index</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/mystyle.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/myfile.js"></script>

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
                    ?><script>alert("ERROR : Mauvais identifiant ou mot de passe.  Veuillez réessayer");</script><?php
                }
				mysqli_close($connexion);
            }    

?>

		<script>
		
//J'initialise une variable qui prend la valeur du cookie
//Si celui-ci n'est pas vide alors je ne propose pas à l'utilisateur de se connecter
		
		var cookies = document.cookie;
	$(document).ready(  
			function(){

		if(cookies==""){
			$('<div class="input-group" id="connexion"><center>Connectez-vous pour avoir acc&egrave;s &agrave; vos favoris<p><form method="post"><input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1" name="email"><input type="password" class="form-control" placeholder="Mot de passe" aria-describedby="basic-addon1" name="motdepasse"><button type="submit" class="btn btn-default" value="Connexion">Connexion</button></form><a href="inscription.php">Je ne suis pas inscrit(e)</a></center></div>').appendTo('.menuvertical');
		}else if(cookies != ""){
			$('<div class="input-group" id="connexion"><center>Bienvenue !<p><a href="favoris.php">Voir la liste de mes favoris</a><p><a href="deconnexion.php">Me déconnecter</a></center></div>').appendTo('.menuvertical');
		}		
	});
	
		</script>


</head>
<body>
<div align="center">
<img src="img/banniere_transparente.png" height="500" width="700"/></div>

<!-- Menu horizontal dans lequel se trouve les rubriques --> 				
<nav class="menuhorizontal navbar">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  		
			<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			
			<li><a href="#" onclick="showCO();">A propos de Corinne Olabisi</a></li>
			
		<!-- Liste déroulante -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&equiv; Cr&eacute;ations pour femmes</a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick="showTops();">Tops</a></li>
            <li><a href="#" onclick="showCombi();">Combishort</a></li>
            <li><a href="#" onclick="showRobes();">Robes</a></li>
            <li><a href="#" onclick="showAF();">Accessoires</a></li>
          </ul>
        </li>
		
		<!-- Liste déroulante -->
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
<!-- Ici se trouvera le menu vertical qui est différent selon si le cookie est créé ou non -->
</div>
<div id="instagram" style="float:right;height:100%;margin:20px;">

<h3 align="center"><b><img src="img/instagram-logo-sketch.png" height="40px" width="50px"/>Suivez-moi sur Instagram !</b></h3>
<script src="http://snapwidget.com/js/snapwidget.js"></script>
<iframe src="http://snapwidget.com/in/?u=Y29yaW5uZW9sYWJpc2l8aW58MTI1fDN8M3x8bm98NXxmYWRlSW58b25TdGFydHx5ZXN8eWVz&ve=211215" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>


</div>
<?php
// (Re) Connexion à la base de données
$dsn ="mysql:dbname=africanmixedcouture;host=localhost";
$username="root";
$passwd="";   

$pdo = new PDO($dsn, $username, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(isset($_COOKIE['utilisateur'])){
$cookieEmail = $_COOKIE['utilisateur'];
$resultatUti = $pdo ->query("SELECT id_utilisateur from utilisateur WHERE email = '$cookieEmail'");
$listeUti = $resultatUti->fetchAll(PDO::FETCH_ASSOC);
	   
	  foreach($listeUti as $value4)
{
        $IdUser = $value4['id_utilisateur'];
		?>
<script language="javascript">

document.cookie="idUtilisateur=<?php echo $IdUser?>";

</script>
<?php }
	}?>

<div id="accueil">

<i>"Faites-vous plaisir, soyez belle et sexy. Surtout soyez unique et restez vous-même. Mes créations aiment les femmes de toutes les tailles et 
toutes les formes et les rendent belles et très féminines. Et bien entendu les hommes aussi !"</i>
<br><br><center><h2 style="color:white;text-shadow: 8px 5px 15px black;">Africamix devient ... African and Mixed Couture !</h2><img src="img/mamannigeria_patch.jpg" height="350px" width="500px"/></center>
<br><h4>Découvrez ici toutes les nouvelles créations de Corinne Olabisi, 
une styliste qui m&eacute;lange son style unique avec son amour pour l'Afrique. Vous trouverez aussi toutes les informations concernant
ses événements et boutiques éphémères. Vous pouvez vous inscrire sur le côté et vous aurez accès à votre liste de favoris ainsi qu'à une newsletter sur mesure, rien que pour vous !
<br>
<br>
Les créations de Corinne Olabisi sont uniques, 100% faites à la main et sont composées de deux tissus différents : Un tissu africain Wax et un tissu simple et uni assorti au Wax auquel il est mélangé. 
Vous pouvez acheter les créations de votre choix à tout moment sur <a href="http://www.alittlemarket.com/boutique/africamix-1122727.html">aLittleMarket</a>, dans la boutique Africamix !
<br>
<br><center><img src="img/logo-alittlemarket1.png"/></center><br><br><p>
Suivez-la sur ses réseaux sociaux ou consulter la rubrique Evénements pour être au courant des prochains événements !
<br><br><center><img src="img/photoEventMontage.png"/></center>
</h4>
</div>


<div id="CO" align="center">
A propos de Corinne Olabisi

Corinne Olabisi est   
</div>

<div id="tops" class="alignement">
<h2 align="center" class="titre2">Les tops</h2>

<?php

include 'divTop.php';
?>

</div>

<div id="combishort">
<h2 align="center">Les combinaisons short et ensembles short</h2>

<?php

include 'divCombi.php';
?>

</div>

<div id="robes">
<h2 align="center">Les robes et ensembles jupes</h2>

<?php

//include 'divRobes.php';
?>
</div>

<div id="accessoiresf">
<h2 align="center">Les accessoires - pour femmes</h2>

<?php

include 'divAF.php';
?>

</div>

<div id="accessoiresh">
<h2 align="center">Les accessoires - pour hommes</h2>

<?php

//include 'divAH.php';
?>

</div>

<div id="event">
<h2 align="center">Ev&eacute;nements</h2>
<img src="img/menuevenement.png"/>
</div>
<div id="services">
<h2 align="center">Services et Tarifs</h2>
</div>
	</div>

<footer>
	<h2><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contacts</h2>
	<br>
	<h4>Pour toute autre information, vous pouvez contacter Corinne Olabisi par mail au :<br>
	<a href="mailto:olacorinne@yahoo.fr">olacorinne@yahoo.fr</a>
	</h4>		<h6 align="center">Site réalisé par Omowumi Olabisi</h6>

</footer>

    </body>
	
</html>
