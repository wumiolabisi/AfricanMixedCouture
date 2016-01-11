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
			$('<div class="input-group" id="connexion"><center>Bienvenue !<p><a href="favoris.php">Voir la liste de mes favoris <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> </a><p><a href="deconnexion.php">Me déconnecter <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></center></div>').appendTo('.menuvertical');
		}		
	});	

	
		</script>


</head>
<body>
<div id="fb-root"></div>

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

<h4 align="center"><b><img src="img/instagram-logo-sketch.png" height="40px" width="50px"/>Suivez-moi sur Instagram @corinneolabisi !</b></h4>
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

<div id="accueil" align="center">
<div id="accueil_description">
<i>"Faites-vous plaisir, soyez belle et sexy. Surtout soyez unique et restez vous-même. Mes créations aiment les femmes de toutes les tailles et 
toutes les formes et les rendent belles et très féminines. Et bien entendu les hommes aussi !"</i>
<br><br><h2 style="color:white;text-shadow: 8px 5px 15px black;">Africamix devient ... African and Mixed Couture !</h2><img src="img/mamannigeria_patch.jpg" height="350px" width="500px"/>
<br><h4>Découvrez ici toutes les nouvelles créations de Corinne Olabisi, 
une styliste qui m&eacute;lange son style unique avec son amour pour l'Afrique. Vous trouverez aussi toutes les informations concernant
ses événements et boutiques éphémères. Vous pouvez vous inscrire sur le côté et vous aurez accès à votre liste de favoris ainsi qu'à une newsletter sur mesure, rien que pour vous !
<br>
<br>
Les créations de Corinne Olabisi sont uniques, 100% faites à la main et sont composées de deux tissus différents : Un tissus africain Wax et un tissus uni assorti. 
Vous pouvez acheter les créations de votre choix à tout moment sur <a href="http://www.alittlemarket.com/boutique/africamix-1122727.html">aLittleMarket</a>, dans la boutique Africamix !
<br>
<br><center><img src="img/logo-alittlemarket1.png"/></center><br><br><p>
Suivez-la sur ses réseaux sociaux ou consulter la rubrique Evénements pour être au courant des prochains événements !
<br><br><center><img src="img/photoEventMontage.png"/></center>
</h4>
</div>
</div>


<div id="CO">
<h3 align="center"><i>A propos de Corinne Olabisi...</i></h3>
<br>
La couture et la mode, je suis "tombée dans la marmite" quand j'étais enfant ! 
Je fabriquais déjà des vêtements pour mes poupée. Et en CM1, j'ai eu un prix à l'école, et devinez quoi, le livre s'appelait <b>"La couture chez soi"</b>. 
<br><br>Si ça n'est pas un signe !
<br><br>Plus tard, je créais mes tenues pour sortir avec mes amies. Mon rêve à l'époque était d'intégrer une grande école de stylisme, du style Esmod.
<br><br> Mais le cout était exorbitant et je n’en n'avais malheureusement pas les moyens. Au fil des ans, j'ai alterné petits boulots et formations 
<br>professionnelles dans les domaines de la couture et du commerce international. Bien que la couture ait toujours fait partie de ma vie, je n'avais jamais envisagé de créer ma propre marque de vêtement. 
<i>Peut-être me sous-estimais-je ou n'étais-je pas prête à être mon propre patron ?</i>
<br><br>Mais plus les années passaient, plus je prenais confiance en moi, et avec l'encouragement de mes enfants et de mon entourage, j’ai enfin pu me rendre compte de ma valeur et de mon talent de créatrice.
<br><br>Passons au présent et au futur radieux qui s'offre à moi grâce à cette opportunité de financement participatif. Mes nombreux voyages en Afrique, notamment au Nigeria, dans le cadre de mon association pour 
<br>le développement agricole de l'Afrique, l'ASDANA, dont je suis la créatrice et présidente, m'ont permis de réfléchir à des activités lucratives qui pourraient apporter des revenus aux familles très pauvres dans les villages au Sud du Nigeria.
J'ai donc pensé à créer de petits ateliers de couture familiaux, mais malgré la motivation des femmes des villages et notre détermination à partager nos savoir-faire en couture, les fonds pour acheter les machines et les fournitures de couture manquaient.
<br><br>Lors de mes retours en France, à chaque fois, je me disais que j'allais créer ma propre activité afin d’augmenter mes revenus et pouvoir aider financièrement les projets de mon association. Mais je n'arrivais pas à quitter mon travail de salariée. C’était la sécurité assurée même si ma vie était médiocre et très ennuyante.
<br><br>Comme tout le monde le sait, lorsqu'on est pris dans le "train-train" quotidien, notre salaire arrive à la fin du mois, et on paye les factures, on nourrit notre famille (j'ai 4 supers enfants), et il ne reste plus rien pour investir sur des projets qui nous tiennent à cœur !
<br><br>Je commençais à m'endormir dans la routine....Et la peur de se lancer dans l'inconnu...
C'est au retour de mon dernier voyage au Nigeria en Mai 2014, que j'ai réalisé qu'il fallait que je réalise mes rêves et mes projets.
J'ai donc décidé de vivre de ma passion : la couture et la création de modèles originaux et uniques.
<br><b>Quel bonheur d’exercer un métier qui vous passionne !</b>
<br><br>Amoureuse de l'Afrique depuis ma jeunesse et Parisienne jusqu'au bout des ongles, j'ai voulu exprimer cet amour par des créations métissées, en mixant les tissus Africains et les tissus simples. 
Ceci afin de montrer que l'alliance entre deux cultures donne de merveilleux résultats. L'Afrique pour sa chaleur et sa convivialité ; Paris pour la Mode, l'élégance et le chic.
J'ai déjà créer une petite collection de robes, jupes, crop top et combi-short. Et depuis quelques semaines, j'ai décidé de m'occuper des hommes. Car que ferions-nous sans eux !! 
Je commence donc à créer des accessoires mode pour hommes notamment des bretelles et des nœuds papillon assorits.
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
<br>
Corinne Olabisi réalise pour vous les modèles présentés dans les catégories créations pour hommes et femmes sur mesure si vous le souhaiter.
<br>Elle peut également retoucher vos vêtements. Vous trouverez ci-dessous les tarifs de retouches.
<br>
Pour commander une création sur mesure ou faire retoucher vos vêtements, vous pouvez la contacter par mail : olacorinne@yahoo.fr
<br>
<br>

<table border="2" class="table" style="width:50%">
<tr>
        <td><h4 align="center"><b>Retouches sur jupes, robes et tops</b></h4></td>
    </tr>
    <tr>
        <td><b>DESIGNATION</b></td>
        <td><b>PRIX UNIT. TTC EN €</b></td>
    </tr>
    <tr>
        <td>Raccourcir (jupe/robe droite)</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Ourlet sur jupe plissée</td>
        <td>20</td>
    </tr>
    <tr>
        <td>Rétrécir sur les côtés sur toute la longueur - sans doublure</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Rétrécir sur les côtés sur toute la longueur - avec doublure</td>
        <td>25</td>
    </tr>
    <tr>
        <td>Cintrage robe</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Pose fermeture glissière (non fournie) jupe</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Pose fermeture glissière (non fournie) robe</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Cintrage chemisier</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Raccourcissement chemisier</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Raccourcissement manches avec pattes poignets</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Raccourcissement manches sans pattes poignets</td>
        <td>10</td>
    </tr>
</table>
<br>
<center>
<table border="2" class="table" style="width:50%">
<tr>
        <td><h4 align="center"><b>Retouches sur pantalons</b></h4></td>
    </tr>
    <tr>
        <td><b>DESIGNATION</b></td>
        <td><b>PRIX UNIT. TTC EN €</b></td>
    </tr>
    <tr>
        <td>Ourlet</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Ourlet américain (avec revers)</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Ourlet sur Jeans</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Reprendre la ceinture</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Rétrécir un côté du pantalon</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Rétrécir deux côtés</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Fourche entrejambes</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Changer la fermeture glissière (non fournie)</td>
        <td>12</td>
    </tr>
    <tr>
        <td>Rétrécir le bas (fuselage)</td>
        <td>20</td>
    </tr>
</table>


<table border="2" class="table" style="width:50%">
<tr>
        <td><h4 align="center"><b>Retouches sur vestes et manteaux</b></h4></td>
    </tr>
    <tr>
        <td><b>DESIGNATION</b></td>
        <td><b>PRIX UNIT. TTC EN €</b></td>
    </tr>
    <tr>
        <td>Ourlet manche simple piqué</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Manches rondes doublées</td>
        <td>17</td>
    </tr>
    <tr>
        <td>Manches avec boutonnières</td>
        <td>20</td>
    </tr>
    <tr>
        <td>Ourlet bas droit</td>
        <td>25</td>
    </tr>
    <tr>
        <td>Ourlet en gobet</td>
        <td>30</td>
    </tr>
    <tr>
        <td>Cintrer la taille</td>
        <td>20</td>
    </tr>
    <tr>
        <td>Changer fermeture glissière (non fournie) 3/4</td>
        <td>20</td>
    </tr>
	  <tr>
        <td>Changer fermeture glissière (non fournie) long</td>
        <td>30</td>
    </tr>
</table>

<table border="2" class="table" style="width:50%">
<tr>
        <td><h4 align="center"><b>Autres retouches vêtements</b></h4></td>
    </tr>
    <tr>
        <td><b>DESIGNATION</b></td>
        <td><b>PRIX UNIT. TTC EN €</b></td>
    </tr>
    <tr>
        <td>Reprise simple  (accrocs, raccourcissement bretelles, etc...)</td>
        <td>5</td>
    </tr>
    <tr>
        <td>Changement ou pose élastique sur tous vêtements</td>
        <td>15</td>
    </tr>
    <tr>
        <td>Raccourcir le bas de t-shirt</td>
        <td>8</td>
    </tr>
    <tr>
        <td>Pose de biais ou galon - le mètre</td>
        <td>5</td>
    </tr>
	  <tr>
        <td>Raccourcissement bretelles larges avec fronces</td>
        <td>3</td>
    </tr>
    <tr>
        <td>Déchirure couture sur manteau doublé (doudoune)</td>
        <td>5</td>
    </tr>
	  <tr>
        <td>Fabrication + pose de passants ceinture</td>
        <td>8</td>
    </tr>
 <tr>
        <td>Reprise fond de poche manteaux</td>
        <td>5</td>
    </tr>
    <tr>
        <td>Pose boutons</td>
        <td>0.50</td>
    </tr>
    <tr>
        <td>Boutonnière</td>
        <td>1</td>
    </tr>
    <tr>
        <td>Autres selon tarif horaire</td>
        <td>20 €/heure</td>
    </tr>
</table>

<table border="2" class="table" style="width:50%">
<tr>
        <td><h4 align="center"><b>Ameublement</b></h4></td>
    </tr>
    <tr>
        <td><b>DESIGNATION</b></td>
        <td><b>PRIX UNIT. TTC EN €</b></td>
    </tr>
    <tr>
        <td>Rideaux selon longueur - le mètre</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Ruban rufflette 35mm posé - le mètre</td>
        <td>5</td>
    </tr>
    <tr>
        <td>Housse de coussins/oreillers 45x45</td>
        <td>7</td>
    </tr>
    <tr>
        <td>Confection rideau (sans tissu)</td>
        <td>5</td>
    </tr>
</table>
</center>
</div>
	</div>


    </body>
	
<footer><div id="contact">
	<h2>  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  Contacts</h2>
	<br>
	<h4>  Pour toute autre information, vous pouvez contacter Corinne Olabisi par mail à :<br>
	  <a href="mailto:olacorinne@yahoo.fr">olacorinne@yahoo.fr</a>
	</h4>	</div>	<h6 align="center">Site réalisé par Omowumi Olabisi</h6>

</footer>
</html>
