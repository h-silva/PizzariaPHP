<?php
   require_once '../persistence/dao_funcionario.php';
   
   $objetoDao = new DAOFuncionario();
   $objetoDao->removerFuncionario($_REQUEST['codigo']);
 	
	header('Location: ../view/view_funcionario.php');
	exit;
?>