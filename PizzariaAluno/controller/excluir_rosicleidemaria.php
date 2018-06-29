<?php
   require_once '../persistence/dao_rosicleidemaria.php';
   
   $objetoDao = new DAORosicleideMaria();
   $objetoDao->removerRosicleideMaria($_REQUEST['codigo']);
 	
	header('Location: ../view/view_rosicleidemaria.php');
	exit;
?>