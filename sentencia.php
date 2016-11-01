<?php 
	class busquedac
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
			$sql="SELECT ptr.nombre_productor,p.descripcion_producto, pxp.cantidad, pxp.precio, pxp.fecha_recoleccion, tt.tipo_transaccion, pr.punto_recoleccion, pxp.comentario, pxp.fecha_ingreso_producto, ptr.telefono, ptr.codigo_productor, p.codigo_producto, pxp.codigo_tipo_produccion, pxp.codigo_usuario, tt.codigo_tipo_transaccion, pr.codigo_punto_recoleccion  FROM tbl_productores_x_producto pxp inner join tbl_productos p on (pxp.codigo_producto= p.codigo_producto) inner join tbl_productores ptr on (pxp.codigo_productor= ptr.codigo_productor) inner join tbl_tipo_transaccion tt on (pxp.codigo_tipo_transaccion= tt.codigo_tipo_transaccion) inner join tbl_punto_recoleccion pr on (pxp.codigo_punto_recoleccion= pr.codigo_punto_recoleccion) WHERE cantidad like '%".$valor."%' or precio like '%".$valor."%'";
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