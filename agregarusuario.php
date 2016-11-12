<?php
	session_start();
	include 'conexion.php';
	$conexion = new Conexion();
	$con=$conexion->getConexion();
	function encriptar($cadena){
		    $key='sag';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
		    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
		    return $encrypted; //Devuelve el string encriptado
		 
		}
	$resultado=$conexion->comprobarNombreUsuario($_POST['nombreusuario']);
	$myrow = $resultado->fetch_assoc();
	$cantidad=$myrow['cantidad'];

	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	$contador=0;
   for ($i=0; $i<strlen($_POST['nombreusuario']); $i++){ 
      if ((strpos($permitidos, substr($_POST['nombreusuario'],$i,1))===false)){ 
         $contador++;
      } 
   } 
	if (empty($_POST['nombreusuario'])){
		echo "nombre del usuario vacío";
	} else if (empty($_POST['pass1'])||empty($_POST['pass2'])){
		echo "el password esta vacio";
	} else if (strlen ($_POST['pass1'])<4 && strlen ($_POST['pass1'])>8){
		echo "el password debe contener de 4 a 8 caracteres";
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
	} else if ($contador>0) {
        echo "El nombre no debe tener espacios en blanco ni numeros.\n";	
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
			
		$sql="INSERT INTO `tbl_usuarios`(`codigo_usuario`, `user`, `pw`, `direccion`, `telefono`, `correo`, `codigo_tipo_usuario`, `estado_usuario`,`fecha_ingreso`, `codigo_usuario_ingreso` ) VALUES ('','".$nombreusuario."','".encriptar($pass1)."','".$direccion."','".$telefono."','".$correo."','".$tipousuario."','1', now(), '".$_SESSION['codigousuario']."')";
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