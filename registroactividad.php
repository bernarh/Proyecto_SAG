<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])and($_SESSION['codigotipousuario']===1)) {?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
		
	</head>

	<body>

		<header>
			
			<?php include_once('menu/menuadministrador.php') ?>
		</header>
		<br>
		<div>
			<center><h3>Registro de Actividades</h3></center>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
			<div class="row">
		  		<?php include_once('busquedab.php') ?>
			
		  </div>
		
		<br>
		<div class="container">
			<div class="modal fade" id="nuevoregistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			</div>
		</div>

		<br>
		<br>
		<br>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

<footer class="footer">
	
	<div class="row">
		<center><h6>Todos los derechos Reservados @CopyRight</h6></center>
	</div>

</footer>

</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>