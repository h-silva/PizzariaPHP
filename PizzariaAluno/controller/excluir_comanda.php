<?php
   require_once '../persistence/dao_comanda.php';
   
   $objetoDao = new DAOComanda();
   $objetoDao->removerComanda($_REQUEST['codigo']);
 	
	header('Location: ../view/view_comanda.php');
	exit;
?>