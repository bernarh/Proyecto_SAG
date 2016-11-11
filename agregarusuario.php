<?php
	session_start();
	include 'conexion.php';
	$conexion = new Conexion();
	$con=$conexion->getConexion();
	$resultado=$conexion->comprobarNombreUsuario($_POST['nombreusuario']);
	$myrow = $resultado->fetch_assoc();
	$cantidad=$myrow['cantidad'];
	if (empty($_POST['nombreusuario'])){
		echo "nombre del usuario vacío";
	} else if (empty($_POST['pass1'])||empty($_POST['pass2'])){
		echo "el password esta vacio";
	}else if ($_POST['pass1']!=$_POST['pass2']){
		echo  "los password no coinciden";
	} else if (empty($_POST['direccion'])){
		echo "direccion vacío";
	} else if (empty($_POST['telefono'])){
		echo "Telefono vacio";
	} else if (empty($_POST['correo'])){
		echo "correo vacio";
	} else if (empty($_POST['tipousuario'])){
		echo "Tipo usuario vacio";
	} else if ($cantidad!=0){
		echo "El nombre de Usuario ya existe";
	}else{

			$nombreusuario=mysqli_real_escape_string($con,(strip_tags($_POST['nombreusuario'],ENT_QUOTES)));
			$pass1=mysqli_real_escape_string($con,(strip_tags($_POST['pass1'],ENT_QUOTES)));
			$direccion=mysqli_real_escape_string($con,(strip_tags($_POST['direccion'],ENT_QUOTES)));
			$pass2=mysqli_real_escape_string($con,(strip_tags($_POST['pass2'],ENT_QUOTES)));
			$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
			$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
			$tipousuario=mysqli_real_escape_string($con,(strip_tags($_POST["tipousuario"],ENT_QUOTES)));
			
		$sql="INSERT INTO `tbl_usuarios`(`codigo_usuario`, `user`, `pw`, `direccion`, `telefono`, `correo`, `codigo_tipo_usuario`, `estado_usuario`,`fecha_ingreso`, `codigo_usuario_ingreso` ) VALUES ('','".$nombreusuario."','".$pass1."','".$direccion."','".$telefono."','".$correo."','".$tipousuario."','1', now(), '".$_SESSION['codigousuario']."')";
		$query_update = mysqli_query($con,$sql);
			
		if ($query_update){
			echo "Los datos han sido guardados satisfactoriamente.";
			echo '<script> alert("Guardado con exito") </script>';
			echo '<script> window.location="menuadministrador.php"; </script>';		
			} else{
				echo "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
	}

?>