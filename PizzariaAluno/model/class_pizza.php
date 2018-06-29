<?php
   class Pizza{
   		private $codigo;
   		private $nome;
		private $ingredientes;
		private $valor;
		private $status;
		private $tipo;
		
		public function __construct($codigo=0, $nome="", $ingredientes="", $valor="", $status="", $tipo=""){
			$this->codigo = $codigo;	
			$this->nome = $nome;
			$this->ingredientes = $ingredientes;
			$this->valor = $valor;
			$this->status = $status;
			$this->tipo = $tipo;
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
		
		public function setIngredientes($ingredientes){
			$this->ingredientes = $ingredientes;
		}
		
		public function getIngredientes(){
			return $this->ingredientes;
		}
		
		public function setValor($valor){
			$this->valor = $valor;
		}
		
		public function getValor(){
			return $this->valor;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		public function getStatus(){
			return $this->status;
		}

		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
		
		public function getTipo(){
			return $this->tipo;
		}			
   }
?>