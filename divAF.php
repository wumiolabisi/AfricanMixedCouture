<?php


$resultatCreation = $pdo ->query("SELECT creation.libelle,creation.id_creation,creation.description,creation.urlachat,creation.prix  FROM creation INNER JOIN categorie ON categorie.id_categorie = creation.idcategorie WHERE categorie.libelle = 'accessoires_femmes'");
$listeCreation = $resultatCreation->fetchAll(PDO::FETCH_ASSOC);

foreach($listeCreation as $value)
{
        $libelleCreation = $value['libelle'];
        $idCreation = $value['id_creation'];
		$descriptionCreation = $value['description'];
		$prixCreation = $value['prix'];
		$urlCreation = $value['urlachat'];

 
         ?> <div class="libelle"><center><h5> <?php echo $libelleCreation  ?></h5> <?php


$resultatPhoto = $pdo ->query("SELECT photo.chemin FROM photo INNER JOIN creation ON creation.id_creation = photo.idcreation AND photo.chemin LIKE '%1.jpg' WHERE creation.id_creation = $idCreation");
$listePhoto = $resultatPhoto->fetchAll(PDO::FETCH_ASSOC);

foreach($listePhoto as $value2)
{
        $cheminPhoto = $value2['chemin'];

 
         ?><!-- Declenchement du modal -->
<button type="button" class="btn-lg" data-toggle="modal" data-target="#myModal<?php echo $idCreation ?>">
<img class="images" src="<?php echo $cheminPhoto ?>"/>
<br>
</button></center></div>


<!-- Modal -->
<div id="myModal<?php echo $idCreation ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center"><?php echo $libelleCreation ?></h4>
      </div>
      <div class="modal-body">
       <?php
	   
	   
$resultatPhoto2 = $pdo ->query("SELECT photo.chemin FROM photo INNER JOIN creation ON creation.id_creation = photo.idcreation WHERE creation.id_creation = $idCreation");
$listePhoto2 = $resultatPhoto2->fetchAll(PDO::FETCH_ASSOC);
	   
	  

foreach($listePhoto2 as $value3)
{
        $cheminPhoto2 = $value3['chemin'];

?>

<center><img class="imagesmodals" src="<?php echo $cheminPhoto2?>"/><br>
<?php  }?>  	  <h5><?php echo $descriptionCreation ?></h5><br></center>
<h5>Prix : <?php echo $prixCreation ?> €</h5><br>
 
      </div>
      <div class="modal-footer">



	 <center> 	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.open('<?php echo $urlCreation ?>');">Acheter sur AlittleMarket.com <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
	 <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.open('favoris.php?idUti=<?php echo $IdUser ?>&idCrea=<?php echo $idCreation?>&insertion=1');">Favoris <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></button>
   <?php }?>     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button></center>
	 </div>
    </div>

  </div>
</div>
          
       <?php
	        
   }  
	
	
	 

?>