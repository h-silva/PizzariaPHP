<?php
   require_once '../persistence/dao_pizza.php';
   
   $objetoPizza = new DAOPizza();
   $objetoPizza->removerPizza($_REQUEST['codigo']);
 	
	header('Location: ../view/view_pizza.php');
	exit;
?>