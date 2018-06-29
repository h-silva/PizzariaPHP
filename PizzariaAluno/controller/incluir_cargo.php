<?php
   require_once '../persistence/dao_cargo.php';
   
   $objetoCargo = new Cargo();
   $objetoCargo->setNome($_REQUEST['nome']);
   $objetoCargo->setDescricao($_REQUEST['descricao']);
   $objetoCargo->setSalarioBase($_REQUEST['salarioBase']);
   
   $dao = new DAOCargo();
   $dao->cadastrarCargo($objetoCargo); 
 	
	header('Location: ../view/view_cargo.php');
	exit;
?>