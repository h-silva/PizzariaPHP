<?php
   class Cargo{
   		private $codigo;
		private $nome;
		private $descricao;
		private $salarioBase;
		
		public function __construct($codigo=0, $nome="", $descricao="", $salarioBase=0){
			$this->codigo = $codigo;	
			$this->nome = $nome;
			$this->descricao = $descricao;
			$this->salarioBase = $salarioBase;
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
		
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		
		public function getDescricao(){
			return $this->descricao;
		}
		
		public function setSalarioBase($salarioBase){
			$this->salarioBase = $salarioBase;
		}
		
		public function getSalarioBase(){
			return $this->salarioBase;
		}
	
   }
?>