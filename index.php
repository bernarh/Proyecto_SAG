<?php
	session_start();
	include 'conexion.php';
	if(isset($_SESSION['user'])){
		echo '<script> window.location="logout.php"; </script>';
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Stylelogin.css">
		<link rel="shortcut icon" href="imagenes/cacao.ico">
		<title>Login</title>
	</head>
	<body>
		<header>
			<center><h1 id="login">Sistema de Control de Precio del Cacao</h1></center>
			<div class="row">
				<div class="container-fluid" id="logos">
					<div class="">
						<img class="col-xs-10 col-sm-10 col-md-10" src="">

					</div>					
					<div class="clearfix visible-xs-block"></div>
					<div class="clearfix visible-sm-block"></div>
					
			</div>
		</header>
		<br>
		<br>
	
		<div class="container row " id="caja">
			<center><h1 id="login">Bienvenido</h1></center>
		<form action="validar.php" method="post">
			<input id="inputext" type="text" name="user" required placeholder="USERNAME"/>
			<input id="inputext" type="password" name="pw" required placeholder="PASS"/>
		<input id="botonlogin" type="submit" name="login" value="Entrar"/>
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