<?php
	
	class Conexion 
	{
		private $conect;

		function __construct()
		{
			$this->conect = new mysqli("localhost", "root", "", "prueba_db");
			/* verificar conexión */
			if (mysqli_connect_errno()) {
    			printf("Connect failed: %s\n", mysqli_connect_error());
    			exit();
			}
		}
		
		/* retorna una conexion conexión */
		public function getConexion(){
			return $this->conect;
		}
		/* cerrar conexión */
		public function cerrarConexion(){
			mysqli_close($this->conect);
		}
		/* consulta de productos recientes en registro.php*/
		public function llenarProductosRecientes(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT pxp.codigo_producto, pxp.cantidad, pxp.precio, pxp.fecha_ingreso_producto, p.descripcion_producto, ptr.nombre_productor FROM tbl_productores_x_producto pxp inner join tbl_productos p on (pxp.codigo_producto= p.codigo_producto) inner join tbl_productores ptr on (pxp.codigo_productor= ptr.codigo_productor) order by pxp.fecha_ingreso_producto desc limit 5 ")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para combobox No. zona en registro.php */
		public function llenarNoZona(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_zona, numero_zona FROM tbl_zonas  order by codigo_zona asc")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para combobox tipo transaccion en registro.php */
		public function llenarTipoTransaccion(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_tipo_transaccion, tipo_transaccion FROM tbl_tipo_transaccion  order by codigo_tipo_transaccion asc")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para combobox tipo productos en registro.php */
		public function llenarProductos(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT p.codigo_producto,p.descripcion_producto, tc.nombre_tipo_cacao FROM tbl_productos p left join tbl_tipos_de_cacao tc on (p.codigo_tipo_cacao=tc.codigo_tipo_cacao) order by codigo_producto asc")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para combobox tipo produccion en registro.php */
		public function llenarTipoProduccion(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_tipo_produccion,tipo_produccion from tbl_codigo_tipo_produccion ")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para buscar tecnicos en registro.php */
		public function buscarProductor($nombreProductor){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_productor FROM tbl_productores WHERE nombre_productor=?")) {
				$stmt->bind_param("s",$nombreProductor);
    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para combobox municipio en new_productor.php */
		public function llenarMunicipio(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_municipio, nombre_municipio FROM tbl_municipios ")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		/* consulta para combobox punto recoleccion en registro.php */
		public function llenarPuntoRecoleccion(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_punto_recoleccion, punto_recoleccion FROM tbl_punto_recoleccion  ")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		public function llenartipodeusuario(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT codigo_tipo_usuario, nombre_tipo_usuario FROM tbl_tipos_usuario order by codigo_tipo_usuario asc")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		public function fechaNormal($fecha){
			$nfecha = date('d/m/Y',strtotime($fecha));
			return $nfecha;
		}


	}
	
?>