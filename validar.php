<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			function encriptar($cadena){
			    $key='sag';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
			    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
			    return $encrypted; //Devuelve el string encriptado
		 
			}
 
		function desencriptar($cadena){
		     $key='sag';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
		     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		    return $decrypted;  //Devuelve el string desencriptado
		}
			require_once( 'usuario.php');
			require_once( 'conexion.php');
			$conexion = new Conexion();
			if(isset($_POST['login'])){
				$usuario= new Usuario($_POST['user'],encriptar($_POST['pw']));
				$usuario->autenticar();
				if ($usuario->getCodigoTipoUsuario()!=null && $usuario->getEstadoUsuario()!=0 ) {
					$_SESSION["user"] = $usuario->getUser();
					$_SESSION["codigotipousuario"] = $usuario->getCodigoTipoUsuario();
					$_SESSION["codigousuario"] = $usuario->getCodigoUsuario();
				  	echo 'Iniciando sesión para '.$_SESSION['user'].' <p>';
				  	if ($usuario->getCodigoTipoUsuario()==1){
				  		$accion="Ingreso el usuario con codigo: ".$_SESSION["codigousuario"];
						$connect=$conexion->getConexion();
						$query= "INSERT INTO tbl_bitacora values('','".$_SESSION['user']."',now(),'$accion')";
						$result= mysqli_query($connect,$query);
						echo '<script> window.location="menuadministrador.php"; </script>';
					}else if ($usuario->getCodigoTipoUsuario()==2){
						$accion="Ingreso el usuario con codigo: ".$_SESSION["codigousuario"];
						$connect=$conexion->getConexion();
						$query= "INSERT INTO tbl_bitacora values('','".$_SESSION['user']."',now(),'$accion')";
						$result= mysqli_query($connect,$query);
						echo '<script> window.location="ver_datosdirector.php"; </script>';
					}else if ($usuario->getCodigoTipoUsuario()==3){
						$accion="Ingreso el usuariocon codigo: ".$_SESSION["codigousuario"];
						$connect=$conexion->getConexion();
						$query= "INSERT INTO tbl_bitacora values('','".$_SESSION['user']."',now(),'$accion')";
						$result= mysqli_query($connect,$query);
						echo '<script> window.location="registrar.php"; </script>';
					}
				} else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="index.php"; </script>';
				}
			}
		?>	
</body>
</html>