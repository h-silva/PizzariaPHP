<?php
   require_once '../persistence/dao_pizza.php';
   
   $objetoPizza = new Pizza();
   $objetoPizza->setNome($_REQUEST['nome']);
   $objetoPizza->setIngredientes($_REQUEST['ingredientes']);
   $objetoPizza->setValor($_REQUEST['valor']);
   $objetoPizza->setStatus($_REQUEST['status']);
   $objetoPizza->setTipo($_REQUEST['tipo']);

   
   $dao = new DAOPizza();
   $dao->cadastrarPizza($objetoPizza); 
	header('Location: ../view/view_pizza.php');
	exit;
?>