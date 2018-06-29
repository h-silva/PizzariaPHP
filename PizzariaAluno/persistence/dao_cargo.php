<?php
    require_once 'conexao.php';
	require_once '../model/class_cargo.php'; 
	
	class DAOCargo{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }		
		}		
		public function cadastrarCargo(Cargo $cargo){
			$nome = $cargo->getNome();
			$descricao = $cargo->getDescricao(); 
			$salarioBase = $cargo->getSalarioBase();

			$sql = "INSERT INTO cargo (nome, descricao, salariobase) VALUES ('$nome', '$descricao', '$salarioBase')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarCargos(){
			$lista = $this->conexao->executarQuery("SELECT * FROM cargo");
			$arrayCargos = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$cargo = new Cargo($linha['codigo'],$linha['nome'],$linha['descricao'],$linha['salarioBase']);
				array_push($arrayCargos,$cargo);
			}
			return $arrayCargos;
		}
		
		public function removerCargo($codigo){
			$sql = "DELETE FROM cargo WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}			
	}
	
?>