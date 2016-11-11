<?php 
	class busquedausuario
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
		}

		function lista($valor)
		{
			$sql="SELECT `codigo_usuario`, `user`, `direccion`, `telefono`, `correo`, `codigo_tipo_usuario`, `fecha_ingreso` , `pw` FROM `tbl_usuarios`  WHERE user like '%".$valor."%' and estado_usuario=1 order by fecha_ingreso desc limit 10 ";
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