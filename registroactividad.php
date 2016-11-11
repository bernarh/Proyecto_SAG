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
										<li class="active"><a href="menuadministrador.php">Editar Usuario</a></li>
										<li><a href="">Registro de Actividades</a></li>
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
			<center><h3>Registro de Actividades</h3></center>
		</div>
		<div class="container">
			<div class="table-responsive">
				<table class="table table-bordered table-hover ">
					<tr class="success">
						<th>C&oacute;digo Actividad</th>
						<th>Nombre del Usuario</th>
						<th>Fecha</th>
						<th>Acci&oacute;n</th>
					</tr>
					<?php
                            $conexion= new Conexion();
                            
                            $sql= "SELECT * FROM tbl_bitacora ORDER BY fecha DESC limit 20";
                                            
                            
                            $result = mysqli_query($conexion->getConexion(),$sql);
                             
                            while ($registro2=mysqli_fetch_array($result)) {
                                 
                                echo '<tr class="active">
                                    <td>'.$registro2['codigo_registro'].'</td>
                                    <td>'.$registro2['nombre_usuario'].'</td>
                                    <td>'.$conexion->fechaNormal($registro2['fecha']).'</td>
                                    <td>'.$registro2['accion'].'</td>
                                  </tr>';
                            }

                        ?>
				</table>
			</div>
			
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