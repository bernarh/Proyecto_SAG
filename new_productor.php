
<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user']) and ($_SESSION['codigotipousuario']===3)) {?>
<!doctype html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
		
	</head>

	<body>

		<header>
			<?php include('menu/menutecnico.php') ?>
			<?php include("modal_new_productor/modal_agregar.php");?>
	  		<?php include("modal_new_productor/modal_modificar.php");?>
	  		<?php include("modal_new_productor/modal_eliminar.php");?>
		</header>

		<br>
		<div>
			<center><h3>Lista de Productores Registrados</h3></center>
		</div>

				<!--Lista de productores en la base de datos -->
				<div class="container list-group">
					<a href="#" class="list-group-item active b" data-toggle="modal" data-target="#nuevoregistro">Elija una de las opciones</a>
					<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#dataRegister">Nuevo Productor</a>
					<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Editar Produtor</a>
					<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Eliminar productor</a>
				</div>
		<br>
			</div>
		</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<div class="row">
			<div class="col-xs-12">
			<div id="loader" class="text-center"> <img src="imagenes/loader.gif"></div>
			<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
			<div class="outer_div"></div><!-- Datos ajax Final -->
			</div>
		  </div>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="js/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/appnewproductor.js"></script>
		<script>
			$(document).ready(function(){
				load(1);
			});
		</script>
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