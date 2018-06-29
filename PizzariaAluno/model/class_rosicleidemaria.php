<?php
   class RosicleideMaria{
   		private $codigo;
		private $primeiroNome;
		private $ultimoNome;
		
		public function __construct($codigo=0, $primeiroNome="", $ultimoNome=""){
			$this->codigo = $codigo;	
			$this->primeiroNome = $primeiroNome;
			$this->ultimoNome = $ultimoNome;
		}		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setPrimeiroNome($primeiroNome){
			$this->primeiroNome = $primeiroNome;
		}
		
		public function getPrimeiroNome(){
			return $this->primeiroNome;
		}
		
		public function setUltimoNome($ultimoNome){
			$this->ultimoNome = $ultimoNome;
		}
		
		public function getUltimoNome(){
			return $this->ultimoNome;
		}
	
   }
?>