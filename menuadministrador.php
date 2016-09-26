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
										<span class="sr-only">Menu </span>
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
										<li class="active"><a href="">Editar Usuario</a></li>
										<li><a href="registroactividad.php">Registro de Actividades</a></li>
										<li><a href="">Ver Datos</a></li>
										<li><a href="">Reportes</a></li>
										<li class="dropdown">
											<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Graficos<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Grafico de Barras</a></li>
												<li><a href="#">Grafico de Linea</a></li>
												<li><a href="#">Grafico Circular</a></li>
												<li class="divider"></li>
												<li><a href="#">Grafico Precio Internacional</a></li>

											</ul>
										</li>
										<li class="dropdown ">
											<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Opci&oacute;n<span class="caret"></span></a>	 		
											<ul href="opcion" class="dropdown-menu">
												<li><a href="logout.php">Cerrar Sesi&oacute;n</a></li>
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
			<center><h3>Usuarios Registrados Recientemente</h3></center>
		</div>
		<div class="container">
			<div class="table-responsive">
				<table class="table table-bordered table-hover ">
					<tr class="success">
						<th>C&oacute;digo Usuario</th>
						<th>Nombre del Usuario</th>
						<th>Fecha de Nacimiento</th>
						<th>Tel&eacute;fono</th>
						<th>Correo Electr&oacute;nico</th>
					</tr>
					<tr class="active">
						<td>0001</td>
						<td>Usuario 1</td>
						<td>16/09/2016</td>
						<td>0000-0000</td>
						<td>usuario1@dominiocorreo.com</td>
					</tr>
					<tr class="active">
						<td>0002</td>
						<td>Usuario 2</td>
						<td>16/09/2016</td>
						<td>0000-0000</td>
						<td>usuario2@dominiocorreo.com</td>
					</tr>
					<tr class="active">
						<td>0003</td>
						<td>Usuario 3</td>
						<td>16/09/2016</td>
						<td>0000-0000</td>
						<td>usuario3@dominiocorreo.com</td>
					</tr>
				</table>
			</div>
			
		</div>
		<br>
		<div class="container">
			<!--boton que accede a ventana modal -->
			<button class="btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Agregar</button>
			<button class="btn btn-success" data-toggle="modal" data-target="#editarregistro">Modificar</button>
			<button class="btn btn-success" data-toggle="modal" data-target="#editarregistro">Eliminar</button>
			<!--boton que accede a ventana modal -->
		</div>
		<div class="container">
			<!--boton que accede a ventana modal -->	
			<div class="modal fade" id="nuevoregistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<!--Ventana modal (inicio) -nuevo registro -->
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Crear Usuario:</h4>
						</div>

						<div class="modal-body">
							<!--formulario -nuevo registro -->
							<div class="container">
								<form action="" class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Nombres del Usuario:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="Nombres del Usuario">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Apellidos del Usuario:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="Apellidos del Usuario">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">No. Tel&eacute;fono:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="No. Tel&eacute;fono">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Contraseña:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="password" placeholder="Password">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Repita Contraseña:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="password" placeholder="password">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="fech1">Fecha de Nacimiento:</label>
										<div class="col-md-4">
											<input class="form-control" id="fech1" type="date" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Correo Electr&oacute;nico:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="email" placeholder="correo electr&oacute;nico">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" for="tipop">Tipo de Usuario:</label>
										<div class="col-md-4">
											<select class="form-control" value="" id="tipop">
												<option value="">--Opci&oacute;n--</option>
												<option value="">Administrador</option>
												<option value="">T&eacute;cnico</option>
												<option value="">Supervidor</option>
											</select>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-success" data-dismiss="modal">Enviar</button>
						</div>

					</div>
				</div>
				<!--Ventana modal (fin) -nuevo registro -->

			</div>
		</div>


		<div class="container">
			<!--boton que accede a ventana modal -->	
			<div class="modal fade" id="editarregistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<!--Ventana modal (inicio) -nuevo registro -->
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Editar Usuario:</h4>
						</div>

						<div class="modal-body">
							<!--formulario -nuevo registro -->
							<div class="container">
								<form action="" class="form-horizontal">

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">N&uacute;mero del Usuario:</label>
										
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="N&uacute;mero del Usuario:">
											<br>
											<button  type="submit" class="btn btn-success" data-dismiss="modal">Buscar</button>
									</div>
								</div>

								

								<form action="" class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Nombres del Usuario:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="Nombres del Usuario">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Apellidos del Usuario:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="Apellidos del Usuario">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">No. Tel&eacute;fono:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="No. Tel&eacute;fono">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Contraseña:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="password" placeholder="Password">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Repita Contraseña:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="password" placeholder="password">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="fech1">Fecha de Nacimiento:</label>
										<div class="col-md-4">
											<input class="form-control" id="fech1" type="date" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="nomtec">Correo Electr&oacute;nico:</label>
										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="email" placeholder="correo electr&oacute;nico">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" for="tipop">Tipo de Usuario:</label>
										<div class="col-md-4">
											<select class="form-control" value="" id="tipop">
												<option value="">--Opci&oacute;n--</option>
												<option value="">Administrador</option>
												<option value="">T&eacute;cnico</option>
												<option value="">Supervidor</option>
											</select>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-success" data-dismiss="modal">Editar</button>
							<button type="submit" class="btn btn-success" data-dismiss="modal">Eliminar</button>
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