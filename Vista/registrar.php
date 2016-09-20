<!doctype html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Style.css">
		
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
										<li class="active"><a href="">Registrar</a></li>
										<li><a href="">Nuevo Productor</a></li>
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
											<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Opc.<span class="caret"></span></a>	 		
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
			<center><h3>Datos Recientemente Ingresados</h3></center>
		</div>
		<div class="container">
			<div class="table-responsive">
				<table class="table table-bordered table-hover ">
					<tr class="success">
						<th>C&oacute;digo</th>
						<th>Tipo de Producto</th>
						<th>Fecha de ingreso</th>
						<th>Usuario Digitador</th>
						<th>Estado</th>
					</tr>
					<tr class="active">
						<td>0001</td>
						<td>baba</td>
						<td>16/09/2016</td>
						<td>Usuario 1</td>
						<td>Activo</td>
					</tr>
					<tr class="active">
						<td>0002</td>
						<td>Fermentado Seco</td>
						<td>16/09/2016</td>
						<td>Usuario 1</td>
						<td>Inactivo</td>
					</tr>
					<tr class="active">
						<td>0003</td>
						<td>Fermentado</td>
						<td>16/09/2016</td>
						<td>Usuario 1</td>
						<td>Inactivo</td>
					</tr>
				</table>
			</div>
			
		</div>
		<br>
		<div class="container">
			<!--boton que accede a ventana modal -->
			<button class="btn btn-success" data-toggle="modal" data-target="#nuevoregistro">Nuevo Registro</button>
			<div class="modal fade" id="nuevoregistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<!--Ventana modal (inicio) -nuevo registro -->
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Hoja de recolecci&oacute;n de informaci&oacute;n de comercializaci&oacute;n de productos del cacao:</h4>
						</div>

						<div class="modal-body">
							<!--formulario -nuevo registro -->
							<div class="container">
								<form action="" class="form-horizontal">

									<div class="form-group">

										<label class="control-label col-md-2" for="nomtec">Nombre del T&eacute;cnico:</label>

										<div class="col-md-4">
											<input class="form-control" id="nomtec" type="text" placeholder="Nombre del T&eacute;cnico">
										</div>
									</div>
									

									<div class="form-group">

										<label class="control-label col-md-2" for="zona">Zona No:</label>
										<div class="col-md-4">
											<input class="form-control" id="zona" type="number" placeholder="Zona">
										</div>
										
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="hoja">Hoja No:</label>
										<div class="col-md-4">
											<input class="form-control" id="hoja" type="number" placeholder="Hoja:">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="tel">Tel&eacute;fono:</label>
										<div class="col-md-4">
											<input class="form-control" id="hoja" type="number" placeholder="Tel&eacute;fono">
										</div>

									</div>

									<div class="form-group">
								
										<label class="control-label col-md-2" for="fech1">Fecha de recolecci&oacute;n inicial:</label>
										<div class="col-md-4">
											<input class="form-control" id="fech1" type="date" >
										</div>
									</div>

									<div class="form-group">

										<label class="control-label col-md-2" for="fech2">Fecha de recolecci&oacute;n final:</label>
										<div class="col-md-4">
											<input class="form-control" id="fech2" type="date" >
										</div>
										
									</div>

									<br>

									<h4>Informaci&oacute;n de compra/venta</h4>
									<br>

									<div class="form-group">
									
										<label class="control-label col-md-2" for="fech3">Fecha de ingreso:</label>
										<div class="col-md-4">
											<input class="form-control" id="fech3" type="date" >
										</div>
									</div>

									<div class="form-group">
						

										<label class="control-label col-md-2" for="punto">Punto de recolecci&oacute;n:</label>
										<div class="col-md-4">
											<input class="form-control" id="punto" type="text" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="tipot">Tipo de transacci&oacute;n:</label>
										<div class="col-md-4">
											<input class="form-control" id="tipot" type="text" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="product">Producci&oacute;n:</label>
										<div class="col-md-4 radio-inline">
											<label class="radio-inline">
											  <input type="radio" name="inlineRadioOptions" id="product1" value="C"> C
											</label>
											<label class="radio-inline">
											  <input type="radio" name="inlineRadioOptions" id="product2" value="O"> O
											</label>											
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="tipop">Elija el tipo de producto::</label>
										<div class="col-md-4">
											<select class="form-control" value="" id="tipop">
											<option value="">--Opci&oacute;n--</option>
											<option value="">Baba tipo A</option>
											<option value="">Baba tipo b</option>
											<option value="">Fermentado Seco</option>
											<option value="">Fermentado Seco B</option>
											<option value="">Seco sin Fermentar</option>

										</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="precio">Precio del producto:</label>
										<div class="col-md-2">
											<input class="form-control" id="precio" type="number" placeholder="Precio:">
										</div>
										<div class="col-md-2">
											<label class="control-label ">Uni/Lb</label>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="volumen">Volumen del producto:</label>
										<div class="col-md-2">
											<input class="form-control" id="volumen" type="number" placeholder="Volumen:">
										
										</div>
										<div class="col-md-2">
											<label class="control-label " >Uni/Lb</label>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" for="comentario">Comentarios:</label>
										<div class="col-md-4">
											<input class="form-control" id="comentario" type="text" placeholder="Comentarios">
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

		<br>
		<br>
		<br>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

<footer class="footer">
	<div class="row" id="contac">
		<div class="container col-xs-12" >
			<center><h4>Cont&aacute;ctenos:</h4></center>
		</div>

	</div>
	<div class="container row">
		<div class="container col-xs-12 col-sm-2 col-md-2">
			<h6><b>Tel&eacute;fonos:</b></h6>
			<h6>22227-0000</h6>
			<h6>22227-0001</h6>

		</div>
		<div class="col-xs-12 col-sm-7 col-md-7">
			<h6><b>S&iacute;guenos:</b></h6>
			<div>
				<img id="redes" src="imagenes/facebook.png">
				<button class="btn btn-xs btn-link">Facebook</button>
				<img id="redes" src="imagenes/twitter.png">
				<button class="btn btn-xs btn-link">Twitter</button>
				<img id="redes" src="imagenes/whatsapp.jpg">
				<button class="btn btn-xs btn-link">Whatsapp</button>
				<img id="redes" src="imagenes/gmail.ico">
				<button class="btn btn-xs btn-link">Gmail</button>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3">
			<h6><b>Direcci&oacute;n:</b></h6>
			<h6>Boulevar Centroamerica </h6>
		</div>


	</div>
	<div class="row">
		<center><h6>Todos los derechos Reservados @CopyRight</h6></center>
	</div>

</footer>

</html>