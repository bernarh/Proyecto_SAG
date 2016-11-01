<?php 
	class busquedacp
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexionb.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function lista($valor)
		{
			$sql="SELECT  p.codigo_productor, p.nombre_productor, p.telefono, p.correo, p.codigo_zona, p.codigo_municipio, p.ubicacion_exacta, p.fecha_ingreso_productor, p.codigo_usuario, m.nombre_municipio FROM tbl_productores p inner join tbl_municipios m on (p.codigo_municipio=m.codigo_municipio) WHERE nombre_productor like '%".$valor."%' or telefono like '%".$valor."%'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}
	}
	
?>