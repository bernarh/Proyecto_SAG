<?php
	include 'conexion.php';
	$productor = $_GET['term'];
	$conexion= new Conexion();
	$conexion = $conexion->getConexion();
	 
	$consulta = "SELECT codigo_productor, nombre_productor, telefono,codigo_zona, codigo_municipio, ubicacion_exacta  FROM `tbl_productores` WHERE nombre_productor LIKE '%$productor%'";
	 
	$result = $conexion->query($consulta);
	 
	if($result->num_rows > 0){
	    while($fila = $result->fetch_array()){
	        $productores[] = $fila['nombre_productor'];
	    }
	echo json_encode($productores);
	}
?>