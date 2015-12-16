<?php 

  setcookie('utilisateur');
  unset($_COOKIE['utilisateur']);

  setcookie('idUtilisateur');
  unset($_COOKIE['idUtilisateur']);
  
  $i = 0;
  while($i!=1){
  
header('Location:index.php');
  $i++;
  
  }

?>