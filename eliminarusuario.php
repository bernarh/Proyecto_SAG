<?php
	session_start();
	include 'conexion.php';
	$conexion = new Conexion();
	$con=$conexion->getConexion();
	if (empty($_POST['codigousuario'])){
		echo "codigo del usuario vacío";
	}else{
			$codigousuario=mysqli_real_escape_string($con,(strip_tags($_POST['codigousuario'],ENT_QUOTES)));
		$sql="UPDATE `tbl_usuarios` SET  `estado_usuario`='0' WHERE `codigo_usuario`='".$codigousuario."'";
		$query_update = mysqli_query($con,$sql);
			
	if ($query_update){
		echo "Los datos han sido eliminados satisfactoriamente.";
		echo '<script> alert("Eliminado con exito") </script>';
		echo '<script> window.location="menuadministrador.php"; </script>';		
	} else{
			echo "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
	}
	}

?>