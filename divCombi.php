<?php

$resultatCreation = $pdo ->query("SELECT creation.libelle,creation.id_creation,creation.description  FROM creation INNER JOIN categorie ON categorie.id_categorie = creation.idcategorie WHERE categorie.libelle = 'combi'");
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