<?php
   require_once '../persistence/dao_comanda.php';

   $objetoComanda = new Comanda();
   $objetoComanda->setDataCompra($_REQUEST['dataCompra']);
   $objetoComanda->setFormaPagamento($_REQUEST['formaPagamento']);
   $objetoComanda->setStatus($_REQUEST['status']);
   
   $daoC = new DAOComanda();
   $daoC->cadastrarComanda($objetoComanda, $_REQUEST['funcionario'],$_REQUEST['pizza']); //basta apenas passar o código do cargo, não precisa criar um objeto cargo para inserir esse objeto na classe Funcionario, pois para cadastrar no banco só precisamos da informação do código
   
   header('Location: ../view/view_comanda.php');
   exit;
?>