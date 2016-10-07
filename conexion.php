<?php
	
	class Conexion 
	{
		private $conect;

		public function establecerConexion(){
			$conect = new mysqli("localhost", "root", "", "sag");
		}

		function __construct()
		{
			$this->establecerConexion();
		}
		

		public function getConexion(){
			return $this->conect;
		}

		public function cerrarConexion(){
			mysqli__close($conect);
		}



	}
	
?>