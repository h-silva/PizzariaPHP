<?php
   require_once '../persistence/dao_rosicleidemaria.php';
   
   $objetoRosicleideMaria = new RosicleideMaria();
   $objetoRosicleideMaria->setPrimeiroNome($_REQUEST['primeiroNome']);
   $objetoRosicleideMaria->setUltimoNome($_REQUEST['ultimoNome']);
   
   $dao = new DAORosicleideMaria();
   $dao->cadastrarRosicleideMaria($objetoRosicleideMaria); 
 	
	header('Location: ../view/view_rosicleidemaria.php');
	exit;
?>