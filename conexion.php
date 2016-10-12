<?php
	
	class Conexion 
	{
		private $conect;

		function __construct()
		{
			$this->conect = new mysqli("localhost", "root","", "procacaho_db");
		}
		
		public function getConexion(){
			return $this->conect;
		}

		public function cerrarConexion(){
			mysqli_close($this->conect);
		}



	}
	
?>