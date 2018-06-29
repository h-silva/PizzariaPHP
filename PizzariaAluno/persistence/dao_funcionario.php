<?php
    require_once 'conexao.php';
	require_once '../model/class_funcionario.php';
	require_once '../model/class_cargo.php';
	
	class DAOFuncionario{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	
		
		public function cadastrarFuncionario(Funcionario $funcionario, $codigoCargo){
			$nome = $funcionario->getNome();
			$cpf = $funcionario->getCpf();
			$dataAdmissao = $funcionario->getDataAdmissao();
			$status = $funcionario->getStatus();
			$codigoCargo = $codigoCargo;
			

			$sql = "INSERT INTO funcionario (nome, cpf, dataadmissao, status, codigocargo) 
						 VALUES ('$nome', '$cpf', '$dataAdmissao', '$status', '$codigoCargo')";
			$this->conexao->executarQuery($sql);
		}
		
		public function listarFuncionarios(){
			$lista = $this->conexao->executarQuery("SELECT f.codigo as codigofuncionario, f.nome as nomefuncionario, f.cpf, f.dataadmissao, f.status, 
														c.codigo as codigocargo, c.nome as nomecargo, c.descricao, c.salariobase
 														FROM funcionario f, cargo c WHERE f.codigocargo = c.codigo");
			$arrayFuncionarios = array();
			
			while ($linha = mysqli_fetch_array($lista)) {
				$cargo = new Cargo($linha['codigocargo'], $linha['nomecargo'], $linha['descricao'], $linha['salariobase']);
				$funcionario = new Funcionario($linha['codigofuncionario'],$linha['nomefuncionario'],$linha['cpf'],
									$linha['dataadmissao'],$linha['status'], $cargo); //observe aqui, que $cargo é o objeto da classe Cargo() que estamos adicionando dentro da classe Funcionário()
				
				array_push($arrayFuncionarios,$funcionario);
			}
			return $arrayFuncionarios;
		}
		
		public function removerFuncionario($codigo){
			$sql = "DELETE FROM funcionario WHERE codigo = '$codigo'";
			$this->conexao->executarQuery($sql);
		}
		 
		
	}
	
?>