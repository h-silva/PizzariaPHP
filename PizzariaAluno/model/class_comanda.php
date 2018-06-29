<?php
   class Comanda{
   		private $codigo;
   		private $dataCompra;
		private $status;
		private $formaPagamento;
		private $funcionario;
		private $pizza;

		 //esse atributo será para adicionar um objeto do tipo classe funcionario(), e não simplesmente o nome do cargo, mas o objeto inteiro (essa é a forma mais coerente)
		
		public function __construct($codigo=0, $dataCompra="", $formaPagamento="",$status="",
			$funcionario="", $pizza=""){
			$this->codigo = $codigo;	
			$this->dataCompra = $dataCompra;
			$this->status = $status;
			$this->formaPagamento = $formaPagamento;
			$this->funcionario = $funcionario;
			$this->pizza = $pizza;
		}		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setDataCompra($dataCompra){
			$this->dataCompra = $dataCompra;
		}
		
		public function getDataCompra(){
			return $this->dataCompra;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setFormaPagamento($formaPagamento){
			$this->formaPagamento = $formaPagamento;
		}
		
		public function getFormaPagamento(){
			return $this->formaPagamento;
		}
		
		public function setPizza($pizza){
			$this->pizza = $pizza;
		}
		
		public function getPizza(){
			return $this->pizza;
		}		
		
		public function setFuncionario($funcionario){
			$this->funcionario = $funcionario;
		}
		
		public function getFuncionario(){
			return $this->funcionario;
		}	
   }
?>