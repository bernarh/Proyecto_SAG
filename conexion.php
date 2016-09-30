<?php
	
	class Conexion 
	{
		private $conect;

		function __construct()
		{
			$this->conect = new mysqli("localhost", "root", "", "sag");
		}
		
		public function getConexion(){
			return $this->conect;
		}

		public function cerrarConexion(){
			mysqli__close($this->conect);
		}



	}
	
?>