input
<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])) {?>
<!doctype html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
		
	</head>

	<body>

		<header>
			<div class="row">
				<div class="container-fluid" id="logos">
					<div class="">
						<img class="col-xs-10 col-sm-10 col-md-10"src="imagenes/logos.png">
					</div>					
					<div class="clearfix visible-xs-block"></div>
					<div class="clearfix visible-sm-block"></div>
					<br>		
				</div>
				<div class="container-fluid">
					<nav class="navbar navbar-default ">
							<div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
										<span class="sr-only">Menu</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>

									
									<a class="navbar-brand">
										<img id="icono" alt="Brand" src="imagenes/cacao.ico">
									</a>
									<a href="#icono" class="navbar-brand">PROCACAHO</a>
									
								</div>

								<div class="collapse navbar-collapse" id="navbar-1">
									<ul class="nav navbar-nav">
										<li><a href="registrar.php">Registrar</a></li>
										<li class="active"><a href="">Nuevo Productor</a></li>
										<li><a href="">Ver Datos</a></li>
										<li><a href="">Reportes</a></li>
										<li class="dropdown">
											<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Graficos<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="grafico_barra.php">Grafico de Barras</a></li>
                                                <li><a href="grafico_linea.php">Grafico de Linea</a></li>
                                                <li><a href="grafico_pastel.php">Grafico Circular</a></li>
												<li class="divider"></li>
												<li><a href="#">Grafico Precio Internacional</a></li>

											</ul>
										</li>
										<li class="dropdown ">
											<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Opci&oacute;n<span class="caret"></span></a>	 		
											<ul href="opcion" class="dropdown-menu">
												<li><a href="#">Cerrar Sesi&oacute;n</a></li>
												<li class="divider"></li>
												<li><a href="#">Cambiar Contrase&ntilde;a</a></li>
												<li><a href="#">Mi Perfil</a></li>
												

											</ul>
										</li>


									</ul>

									<form action="" class="navbar-form navbar-right hidden-sm" role="search">
										<div class="form-group">
											<input type="text" class="form-control " placeholder="Buscar">

										</div>

									</form>
								</div>
							</div>
					</nav>
				</div>
			</div>
		</header>

		<br>
		<div>
			<center><h3>Lista de Productores Registrados</h3></center>
		</div>

		<!--Lista de productores en la base de datos -->
		<div class="container list-group">
			<a href="#" class="list-group-item active b" data-toggle="modal" data-target="#nuevoregistro">Elija una de las opciones</a>
			<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Nuevo Productor</a>
			<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Morbi leo risus</a>
			<a href="#" class="list-group-item btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Porta ac consectetur ac</a>
			<a  class="list-group-item btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Vestibulum at eros</a>
		</div>
		<br>
		<!--boton que accede a ventana modal -->
		<div class="container">
			<!--boton que accede a ventana modal -->
			
			<div class="modal fade" id="nuevoregistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<!--Ventana modal (inicio) -nuevo registro -->
				<div class="modal-dialog">

					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Nuevo Productor:</h4>
						</div>

						<div class="modal-body">
							<!--formulario -nuevo registro -->
							<form class="form-horizontal" role="form" action="insertar.php" method="post">
								<div class="container">
									<form action="" class="form-horizontal">
										<div class="form-group">
											<label class="control-label col-md-2" for="tipop">Elija La Ruta:</label>
											<div class="col-md-4">
											<select class="form-control" value="" id="tipop">
												<option value="">--Opci&oacute;n--</option>
												<option value="">Ruta 1</option>
												<option value="">Ruta 2</option>
												<option value="">Ruta 3</option>
												<option value="">Ruta 4</option>
											</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-2" for="tipop">Elija El Municipio:</label>
											<div class="col-md-4">
											<select class="form-control" value="" id="tipop">
												<option value="">--Opci&oacute;n--</option>
												<option value="">Municipio 1</option>
												<option value="">Municipio 2</option>
												<option value="">Municipio 3</option>
												<option value="">Municipio 4</option>
											</select>
											</div>
										</div>
										<div class="form-group">

											<label class="control-label col-md-2" for="nomtec">Nombre del Productor:</label>

											<div class="col-md-4">
												<input class="form-control" id="nomtec" type="text" placeholder="Nombre del Productor">
											</div>
										</div>
										<div class="form-group">

											<label class="control-label col-md-2" for="nomtec">Ubicaci&oacute;n:</label>

											<div class="col-md-4">
												<input class="form-control" id="nomtec" type="text" placeholder="Ubicaci&oacute;n">
											</div>
										</div>

										<div class="form-group">

											<label class="control-label col-md-2" for="zona">No:</label>
											<div class="col-md-4">
												<input class="form-control" id="zona" type="number" placeholder="Zona">
											</div>
											
										</div>
										<div class="form-group">
											<label class="control-label col-md-2" for="tel">Tel&eacute;fono:</label>
											<div class="col-md-4">
												<input class="form-control" id="hoja" type="number" placeholder="Tel&eacute;fono">
											</div>

										</div>

										<div class="form-group">
											<label class="control-label col-md-2" for="tipop">Elija El Supervisor de la Zona:</label>
											<div class="col-md-4">
											<select class="form-control" value="" id="tipop">
												<option value="">--Opci&oacute;n--</option>
												<option value="">Supervisor 1</option>
												<option value="">Supervisor 2</option>
												<option value="">Supervisor 3</option>
												<option value="">Supervisor 4</option>
											</select>
											</div>
										</div>
									</form>
								</div>
							</form>
						</div>

						<div class="modal-footer">
							<input type="button" class="btn btn-default " data-dismiss="modal" value="Cerrar"/>
							<input type="submit" class="btn btn-success" value="Enviar"/>
						</div>

					</div>
				</div>
				<!--Ventana modal (fin) -nuevo registro -->

			</div>
		</div>
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