<?php

 //$connexion = mysqli_connect("localhost", "root","","gsb");


 function testForm(){
     
     $incomplet = 1;
     
      if(($_POST['nom']==NULL) || ($_POST['prenom']==NULL) || ($_POST['email']==NULL) || ($_POST['motdepasse']==NULL) || ($_POST['genre']==NULL))
         {       
             $incomplet = 1;
         }
      elseif(($_POST['nom']!=NULL) && ($_POST['prenom']!=NULL) && ($_POST['email']!=NULL) && ($_POST['motdepasse']!=NULL) && ($_POST['genre']!=NULL))
         {
             $incomplet = 0;
         }
      
       return $incomplet;
 }
 
      if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['motdepasse']) && isset($_POST['genre']))
		{

                $bdd = new PDO('mysql:host=localhost;dbname=africanmixedcouture', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $motdepasse = $_POST['motdepasse'];
				
				if($_POST['genre'] == 0){
				$genre = "homme";
				}elseif( $_POST['genre'] == 1){
				$genre = "femme";
				}
				
                $dateInscription = date("Y-m-d H:i:s");

                $requete = "insert into utilisateur (nom,prenom,email,motdepasse,genre,dateinscription) VALUES ('$nom','$prenom','$email','$motdepasse','$genre','$dateInscription')";
                $test = testForm();  

             if($test == 0)
                {       
                 $result = $bdd->exec($requete);  
                    if($result !== false)
                     {
                         ?><script language="javascript">alert(' Felicitations ! Votre inscription a ete enregistre avec succes ');
														 document.cookie="utilisateur=<?php echo $email?>";
														 document.location = "index.php";</script>
                  <?php
                     }
               }
               
                 elseif($test == 1)
                {
                    ?><script language="javascript">alert('Merci de remplir tous les champs')</script>

<?php
}

}
?>



<html>
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Inscription</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/mystyle.css" rel="stylesheet">


</head>
<body>

<div align="center">
<img src="img/banniere_transparente.png" height="500" width="700"/></div>


 <h2 align="center">Inscrivez-vous</h2>
 <h5 align="center">Vous avez la possibilit&eacute; de vous inscrire pour être inform&eacute; par Newsletter des nouvelles cr&eacute;ations ! Vous pouvez &eacute;galement 
 choisir les cr&eacute;ations qui vous plaisent et elles seront automatiquement list&eacute;es dans votre liste de favoris   </h5>

<div align="center">
<div class="input-group" id="inscription">
<p>
<form method="post">
    <input type="text" class="form-control" placeholder="Nom" aria-describedby="basic-addon1" name="nom">
    <input type="text" class="form-control" placeholder="Pr&eacute;nom" aria-describedby="basic-addon1" name="prenom">
		 <input type="password" class="form-control" placeholder="Mot de passe" aria-describedby="basic-addon1"name="motdepasse">
		 		 <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1"name="email">
        <input type="checkbox" name="genre" value="0">Homme
		<input type="checkbox" name="genre" value="1">Femme
<br><br>

	<button type="submit" class="btn btn-default">Valider votre inscription</button>
</form>
<button type="button" class="btn btn-default" value="Back" onclick="window.history.back();">Retour</button>


</div></div>
    </body>
	<footer><div id="contact">
	<h2>  <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  Contacts</h2>
	<br>
	<h4>  Pour toute autre information, vous pouvez contacter Corinne Olabisi par mail à :<br>
	  <a href="mailto:olacorinne@yahoo.fr">olacorinne@yahoo.fr</a>
	</h4>	</div>	<h6 align="center">Site réalisé par Omowumi Olabisi</h6>

</footer>
</html>
