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

        <!--función para eliminar filas de una tabla-->
        <script type="text/javascript" language="javascript">

            function deleteRow(tableID) {

               try {

                   var table = document.getElementById(tableID);

                   var rowCount = table.rows.length;

     

                   for(var i=0; i<rowCount; i++) {

                        var row = table.rows[i];

                        var chkbox = row.cells[0].childNodes[0];

                        if(null != chkbox && true == chkbox.checked) {

                             table.deleteRow(i);

                             rowCount--;

                             i--;

                        }

                   }

               }catch(e) {

                    alert(e);

               }

          }

        </script>
		
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
										<li><a href="">Registrar</a></li>
										<li><a href="new_productor.php">Nuevo Productor</a></li>
										<li class="active"><a href="">Ver Datos</a></li>
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
												<li><a href="logout.php">Cerrar Sesi&oacute;n</a></li>
												<li class="divider"></li>
												<li><a href="cambiarpw.php">Cambiar Contrase&ntilde;a</a></li>
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

        <!--filtros para el reporte-->
                <div class="container row">
                    <form action="" class="form-horizontal">
                        
                        <div class="col-sm-4 col-md-4">
                            
                            <label class="control-label" for="tipop1">Ruta:</label>
                            <select class="form-control" value="" id="tipop1">
                                <option value="">--Opci&oacute;n--</option>
                                <option value="">Ruta 1</option>
                                <option value="">Ruta 2</option>
                                <option value="">Ruta 3</option>
                                <option value="">Ruta 4</option>
                            </select>
                        </div>
                             <div class="col-sm-4 col-md-4">
                                                
                                <label class="control-label" for="fech1">Fecha inicial:</label>
                                <div class="">
                                    <input class="form-control" id="fech1" type="date" >
                                    
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">

                                <label class="control-label" for="fech2">Fecha final:</label>
                                <div class="">
                                    <input class="form-control" id="fech2" type="date" >
                                </div>
                                
                            </div>
                       
                    
                       
                    </form>

                </div>
                <br>
		<div>
			<center><h3>Hoja de recolecci&oacute;n de informaci&oacute;n de comercializaci&oacute;n de productos de cacao</h3></center>
		</div>
		<div class="container-fluid">
			<div class="table-responsive">
				<table id="dataTable" class="table table-bordered table-hover ">
					<tr class="success">
						<th>Fecha</th>
						<th>Ubicaci&oacute;n</th>
						<th>C&oacute;digo informante</th>
						<th>Punto de recolecci&oacute;n</th>
						<th>Tipo de transacci&oacute;n</th>
                        <th>Producci&oacute;n</th>
                        <th>Tipo de produco</th>
                        <th>Precio</th>
                        <th>Volumen</th>
                        <th>Comentarios</th>
                        <th>Seleccionar</th>
					</tr>
					<tr class="active">
						<td>23/10/2016</td>
						<td>Tela, Atlantida</td>
						<td>informante 1</td>
						<td>Productor</td>
						<td>Venta</td>
                        <td>Convencional</td>
                        <td>fermentado Seco</td>
                        <td>50 Lps.</td>
                        <td>50 Lbs</td>
                        <td>venta al comercio</td>
                        <td><input type="checkbox" NAME="chk"/></td>
					</tr>
					<tr class="active">
						<td>24/10/2016</td>
                        <td>Tela, Atlantida</td>
                        <td>informante 2</td>
                        <td>Productor</td>
                        <td>Venta</td>
                        <td>Convencional</td>
                        <td>fermentado Seco</td>
                        <td>50 Lps.</td>
                        <td>50 Lbs</td>
                        <td>venta al comercio</td>
                        <td><input type="checkbox" NAME="chk1"/></td>
					</tr>
					<tr class="active">
						<td>25/10/2016</td>
                        <td>Tela, Atlantida</td>
                        <td>informante 3</td>
                        <td>Productor</td>
                        <td>Venta</td>
                        <td>Convencional</td>
                        <td>fermentado Seco</td>
                        <td>50 Lps.</td>
                        <td>50 Lbs</td>
                        <td>venta al comercio</td>
                        <td><input type="checkbox" NAME="chk2"/></td>
					</tr>
				</table>
			</div>
			
		</div>
		<br>
	   <div class="container">
        <input class="btn btn-info" type="button" value="Editar">
        <input class="btn btn-danger" type="button" value="Eliminar" onclick="deleteRow('dataTable');">
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
