<?php
session_start();
include 'conexion.php';
if(isset($_SESSION['user'])) { 
	?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Stylepw.css">
		<link rel="shortcut icon" href="imagenes/cacao.ico">
		<title>Cambio de clave</title>
	</head>
	<body>
		<header>
			<?php include_once('menu/menutecnico.php') ?>
		</header>
		<br>
		<br>
	
		<div class="container row " id="caja">
			<center><h1 id="login">Confirmación</h1></center>
		<form action="cambio.php" method="post">
			<input id="inputext" type="password" name="pw" required placeholder="Contraseña actual" /> <img src="imagenes/ayuda.png" title="Ingrese contraseña con la cual ingreso" width="30" height="30"/>
			<input id="inputext" type="password" name="pw1" required placeholder="Nueva contraseña"/>  <img src="imagenes/ayuda.png" title="La contraseña no debe tener espacios en blanco" width="30" height="30"/>
			<input id="inputext" type="password" name="pw2" required placeholder="Confirmar contraseña"/> <img src="imagenes/ayuda.png" title="Las contraseñas deben coincidir" width="30" height="30"/>
			

		<input id="botonlogin" type="submit" name="login" value="Aceptar"/>
		<div class="clearfix"></div>
		</form>
	</div>	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
	</div>
	<footer>


	</footer>
</html>

<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>