<?php
    require_once 'conexao.php';
	require_once '../model/class_rosicleidemaria.php'; 
	
	class DAORosicleideMaria{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
			
		}	
		
		public function cadastrarRosicleideMaria(RosicleideMaria $rosicleidemaria){
			$primeiroNome = $rosicleidemaria->getPrimeiroNome();
			$ultimoNome = $rosicleidemaria->getUltimoNome(); 

			$sql = "INSERT INTO rosicleidemaria (primeiroNome, ultimoNome) VALUES ('$primeiroNome', '$ultimoNome')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarRosicleideMaria(){
			$lista = $this->conexao->executarQuery("SELECT * FROM rosicleidemaria");
			$arrayRosicleideMaria = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$rosicleidemaria = new RosicleideMaria($linha['codigo'],$linha['primeiroNome'],$linha['ultimoNome']);
				array_push($arrayRosicleideMaria,$rosicleidemaria);
			}
			return $arrayRosicleideMaria;
		}
		
		public function removerRosicleideMaria($codigo){
			$sql = "DELETE FROM rosicleidemaria WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}			
	}
	
?>