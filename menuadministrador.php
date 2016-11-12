<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])and($_SESSION['codigotipousuario']===1) ) {?>
<!doctype html>
<html>
	<head>
		 <meta charset="utf-8">
		<meta name="viewport" content="width=device-width", user-scalale =no, initial-scale=1.0, maximum-scale="1.0" , minimum-scale="1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
		<script src="js/jquery.js"></script>
		<title>Agregar Usuario </title>
	</head>
	<body>
		<header>
			<?php include_once('menu/menuadministrador.php') ?>
			<?php include("modal_usuarios/modal_agregar.php");?>
	  		<?php include("modal_usuarios/modal_modificar.php");?>
	  		<?php include("modal_usuarios/modal_eliminar.php");?>
		</header>
		<br>
		
		<div>
		
			<center><h3>Usuarios Registrados Recientemente</h3></center>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<div class='col-xs-6'>
				<h3 class='text-right'>		
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar</button>
				</h3>

			</div>	
		<div class="row">
		  		<?php include_once('busquedau.php') ?>
			
		  </div>
		
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	    <script src="js/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/appusuarios.js"></script>
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