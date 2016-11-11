<?php
	session_start();
	include 'conexion.php';
	$conexion = new Conexion();
	$con=$conexion->getConexion();
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
	}else{
			$codigousuario=mysqli_real_escape_string($con,(strip_tags($_POST['codigousuario'],ENT_QUOTES)));
			$nombreusuario=mysqli_real_escape_string($con,(strip_tags($_POST['nombreusuario'],ENT_QUOTES)));
			$pass1=mysqli_real_escape_string($con,(strip_tags($_POST['pass1'],ENT_QUOTES)));
			$direccion=mysqli_real_escape_string($con,(strip_tags($_POST['direccion'],ENT_QUOTES)));
			$pass2=mysqli_real_escape_string($con,(strip_tags($_POST['pass2'],ENT_QUOTES)));
			$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
			$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
			$tipousuario=mysqli_real_escape_string($con,(strip_tags($_POST["tipousuario"],ENT_QUOTES)));


		$sql="UPDATE `tbl_usuarios` SET  `user`='".$nombreusuario."', `pw`='".$pass1."', `direccion`='".$direccion."', `telefono`='".$telefono."', `correo`='".$correo."', `codigo_tipo_usuario`='".$tipousuario."' WHERE `codigo_usuario`='".$codigousuario."'";
		$query_update = mysqli_query($con,$sql);
			
	if ($query_update){
		echo "Los datos han sido guardados satisfactoriamente.";
		echo '<script> alert("Editado con exito") </script>';
		echo '<script> window.location="menuadministrador.php"; </script>';		
		} else{
			echo "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
		}
	}

?>