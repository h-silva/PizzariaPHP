<?php
   require_once '../persistence/dao_cargo.php';
   
   $objetoDao = new DAOCargo();
   $objetoDao->removerCargo($_REQUEST['codigo']);
 	
	header('Location: ../view/view_cargo.php');
	exit;
?>