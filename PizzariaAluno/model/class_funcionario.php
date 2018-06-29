<?php
   class Funcionario{
   		private $codigo;
		private $nome;
		private $cpf;
		private $dataAdmissao;
		private $status;
		private $cargo; //esse atributo será para adicionar um objeto do tipo classe Cargo(), e não simplesmente o nome do cargo, mas o objeto inteiro (essa é a forma mais coerente)
		
		public function __construct($codigo=0, $nome="", $cpf="", $dataAdmissao="", $status="", $cargo=""){
			$this->codigo = $codigo;	
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->dataAdmissao = $dataAdmissao;
			$this->status = $status;
			$this->cargo = $cargo;
		}		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
		
		public function getCpf(){
			return $this->cpf;
		}
		
		public function setDataAdmissao($dataAdmissao){
			$this->dataAdmissao = $dataAdmissao;
		}
		
		public function getDataAdmissao(){
			return $this->dataAdmissao;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setCargo($cargo){
			$this->cargo = $cargo;
		}
		
		public function getCargo(){
			return $this->cargo;
		}
	
   }
?>