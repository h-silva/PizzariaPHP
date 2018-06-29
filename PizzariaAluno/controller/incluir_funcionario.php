<?php
   require_once '../persistence/dao_funcionario.php';

   $objetoFuncionario = new Funcionario();
   $objetoFuncionario->setNome($_REQUEST['nome']);
   $objetoFuncionario->setCpf($_REQUEST['cpf']);
   $objetoFuncionario->setDataAdmissao($_REQUEST['dataAdmissao']);
   $objetoFuncionario->setStatus($_REQUEST['status']);
   
   $daof = new DAOFuncionario();
   $daof->cadastrarFuncionario($objetoFuncionario, $_REQUEST['codigoCargo']); 
   //basta apenas passar o código do cargo, não precisa criar um objeto cargo para inserir esse objeto na classe Funcionario, pois para cadastrar no banco só precisamos da informação do código
 	
	header('Location: ../view/view_funcionario.php');
	exit;
?>