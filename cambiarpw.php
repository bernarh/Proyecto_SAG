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