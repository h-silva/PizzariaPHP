<?php
    require_once 'conexao.php';
	require_once '../model/class_pizza.php'; 
	
	class DAOPizza{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
			
		}	
		
		public function cadastrarPizza(Pizza $pizza){
			$nome = $pizza->getNome();
			$ingredientes = $pizza->getIngredientes(); 
			$valor = $pizza->getValor();
			$status = $pizza->getStatus();
			$tipo = $pizza->getTipo();

			$sql = "INSERT INTO pizza (nome,ingredientes,valor,status,tipo) VALUES ('$nome', '$ingredientes', '$valor', '$status', '$tipo')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarPizzas(){
			$lista = $this->conexao->executarQuery("SELECT * FROM pizza");
			$arrayPizzas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$pizza = new Pizza($linha['codigo'],
					$linha['nome'],
					$linha['ingredientes'],
					$linha['valor'],
					$linha['status'],
					$linha['tipo']);
				array_push($arrayPizzas,$pizza);
			}
			return $arrayPizzas;
		}

		public function listarPizzasDisponiveis(){
			$lista = $this->conexao->executarQuery("SELECT * FROM pizza WHERE status = 'disponivel'");
			$arrayPizzas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$pizza = new Pizza($linha['codigo'],
					$linha['nome'],
					$linha['ingredientes'],
					$linha['valor'],
					$linha['status'],
					$linha['tipo']);
				array_push($arrayPizzas,$pizza);
			}
			return $arrayPizzas;
		}
		
		public function removerPizza($codigo){
			$sql = "DELETE FROM pizza WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}			
	}
	
?>