
<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user']) and ($_SESSION['codigotipousuario']===3)) {?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Agregar Productores </title>
	<meta name="viewport" content="width=device-width", user-scalale =no, initial-scale=1.0, maximum-scale="1.0" , minimum-scale="1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
		<script src="js/jquery.js"></script>
	</head>

	<body>

		<header>
			<?php include('menu/menutecnico.php') ?>
			<?php include("modal_new_productor/modal_agregar.php");?>
	  		<?php include("modal_new_productor/modal_modificar.php");?>
	  		<?php include("modal_new_productor/modal_eliminar.php");?>
		</header>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<br>
		 <div class="container-fluid">
		<div>
			<center><h3>Lista de Productores Registrados</h3></center>
		</div>

				<!--Lista de productores en la base de datos -->
				<div class="container list-group">
					<a href="#" class="list-group-item active b" data-toggle="modal" data-target="">Elija una de las opciones</a>
					<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#dataRegister">Nuevo Productor</a>
					
					
					
				</div>
		<br>
			</div>
		</div>
	
	<div class="row">
			<div class="col-xs-12">
			
			<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
			<div class="outer_div"></div><!-- Datos ajax Final -->
			</div>
		  </div>
		  <div class="row">
				<?php include_once('productores.php') ?>
			</div>
		</div>
	</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="js/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/appnewproductor.js"></script>
		
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