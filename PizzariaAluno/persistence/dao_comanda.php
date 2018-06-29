<?php
    require_once 'conexao.php';
	require_once '../model/class_comanda.php';
	require_once '../model/class_funcionario.php';
	require_once '../model/class_pizza.php';	
	
	class DAOComanda{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarComanda(Comanda $comanda, $codigoFuncionario, $codigoPizza){
			$dataCompra = $comanda->getDataCompra();
			$formaPagamento = $comanda->getFormaPagamento();
			$status = $comanda->getStatus();
			$funcionario = $codigoFuncionario;
			$pizza = $codigoPizza;
			

			$sql = "INSERT INTO comanda (dataCompra, status, formaPagamento, codigoFuncionario, codigoPizza) 
						 VALUES ('$dataCompra', '$status', '$formaPagamento', '$funcionario', '$pizza')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarComandas(){
			$lista = $this->conexao->executarQuery("SELECT C.codigo as codigoComanda, C.dataCompra as dataCompra, C.status as status,C.formaPagamento as formaPagamento, F.codigo as codigoFuncionario,F.nome as nomeFuncionario,P.codigo as codigoPizza, P.nome as nomePizza 
 					FROM comanda C, funcionario F, pizza P WHERE C.codigoPizza = P.codigo AND C.codigoFuncionario = F.codigo");
			$arrayComandas = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$funcionario = new Funcionario($linha['codigoFuncionario'],$linha['nomeFuncionario']);
				$pizza = new Pizza($linha['codigoPizza'],$linha['nomePizza']);
				$comanda = new Comanda($linha['codigoComanda'],$linha['dataCompra'],$linha['formaPagamento'],$linha['status'],$funcionario,$pizza);
				
				array_push($arrayComandas,$comanda);
			}
			return $arrayComandas;
		}
		
		public function removerComanda($codigo){
			$sql = "DELETE FROM comanda WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}	
	}	
?>