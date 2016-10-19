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
			require_once( 'usuario.php');
			
			if(isset($_POST['login'])){
				$usuario= new Usuario($_POST['user'],$_POST['pw']);
				$usuario->autenticar();
				if ($usuario->getCodigoTipoUsuario()!=null) {
					$_SESSION["user"] = $usuario->getUser();
					$_SESSION["codigotipousuario"] = $usuario->getCodigoTipoUsuario();
					$_SESSION["codigousuario"] = $usuario->getCodigoUsuario();
				  	echo 'Iniciando sesión para '.$_SESSION['user'].' <p>';
				  	if ($usuario->getCodigoTipoUsuario()==1){
						echo '<script> window.location="menuadministrador.php"; </script>';
					}else if ($usuario->getCodigoTipoUsuario()==2){
						echo '<script> window.location="menusupervisor.php"; </script>';
					}else if ($usuario->getCodigoTipoUsuario()==3){

$hostname ="localhost";
$username= "root";
$pass="";
$db="prueba_db";
$accion="Ingreso";
$fecha=date("dd/mm/YYYY");
$connect=mysqli_connect($hostname,$username,$pass,$db);
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