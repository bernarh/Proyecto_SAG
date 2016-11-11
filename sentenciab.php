<?php 
	class busquedab
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			
		}

		function lista($valor)
		{
			if ($valor==null)
				$sql="SELECT `codigo_registro`, `nombre_usuario`, `fecha`, `accion` FROM `tbl_bitacora` WHERE nombre_usuario like '%".$valor."%' or  codigo_registro like '%".$valor."%' order by fecha desc limit 10";
			else
				$sql="SELECT `codigo_registro`, `nombre_usuario`, `fecha`, `accion` FROM `tbl_bitacora` WHERE nombre_usuario like '%".$valor."%' or  codigo_registro like '%".$valor."%' order by fecha desc ";
			$this->conexion->getConexion()->set_charset('utf8');
			$resultados=$this->conexion->getConexion()->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}
	}
	
?>