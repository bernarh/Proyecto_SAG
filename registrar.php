<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user']) and($_SESSION['codigotipousuario']===3) ) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Agregar Produtos </title>
	<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<meta name="viewport" content="width=device-width", user-scalale =no, initial-scale=1.0, maximum-scale="1.0" , minimum-scale="1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
		<script src="js/jquery.js"></script>
  </head>

  <body>
	  <header>
				<?php include_once('menu/menutecnico.php') ?>
	  </header>
			<br>
	  <?php include("modal_registrar/modal_agregar.php");?>
	  <?php include("modal_registrar/modal_modificar.php");?>
	  <?php include("modal_registrar/modal_eliminar.php");?>
	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	    <div class="container-fluid">
		 
			<div class='col-xs-6'>	
				<h3> Listado de Productos Recientes</h3>
			</div>
			<div class='col-xs-6'>
				<h3 class='text-right'>		
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataRegister"><i class='glyphicon glyphicon-plus'></i> Agregar</button>
				</h3>

			</div>	
			
		  <div class="row">
		  		<?php include_once('busqueda.php') ?>
			
		  </div>
		</div>
		
		
		
		
		<script>
			$(document).ready(function(){
				load(1);
			});
		</script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="js/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/app.js"></script>
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