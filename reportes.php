<?php
session_start();
include 'conexion.php';


if(isset($_SESSION['user'])) {

    $where=" ";
      

   if (isset($_POST["xruta"])){
      $zona=$_POST['xruta'];
    } 
    if (isset($_POST["bd-desde"])){
      $fechaini=$_POST['bd-desde'];
    } 
    if (isset($_POST["bd-hasta"])){
      $fechafin=$_POST['bd-hasta'];
    } 


    if(isset($_POST['Buscar'])){
      if(empty($_POST['xruta']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta'])){
            $where="";
                                                   

        }else if(empty($_POST['xruta']) and empty($_POST['bd-desde'])){
            $where="where A.fecha_ingreso_producto <= '".$fechafin."' " ;
                                                   

        }else if(empty($_POST['bd-hasta']) and empty($_POST['xruta'])){
            $where="where a.fecha_ingreso_producto >= '".$fechaini."' ";
            
            
              }else if(empty($_POST['bd-hasta']) and empty($_POST['bd-desde'])){
                        $where= "where c.codigo_zona='".$zona."'";

                    }else if(empty($_POST['xruta']) ){
                               $where="where a.fecha_ingreso_producto between '".$fechaini."' AND '".$fechafin."' ";

                            }else if(empty($_POST['bd-desde']) ){
                                        $where="where c.codigo_zona='".$zona."' AND a.fecha_ingreso_producto <= '".$fechafin."' ";

                                    }else if(empty($_POST['bd-hasta']) ){
                                               $where="where c.codigo_zona='".$zona."' AND a.fecha_ingreso_producto >= '".$fechaini."' ";

                                            }else {
                                                        $where="where c.codigo_zona='".$zona."' AND a.fecha_ingreso_producto between '".$fechaini."' AND '".$fechafin."' ";
                                                        
                                                    }
    }

?>
<!doctype html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Style.css">
        <script src="js/jquery-3.1.1.min.js"></script>

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

          function descargarExcel(tableID){
        //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la información desde el div que lo contiene en el html
        // Obtenemos la información de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById(tableID);
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Reporte.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();
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
										<li><a href="registrar.php">Registrar</a></li>
										<li><a href="new_productor.php">Nuevo Productor</a></li>
										<li class="active"><a href="ver_datos.php">Ver Datos</a></li>
										<li><a href="reportes.php">Reportes</a></li>
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
                    <form method="POST" class="form-horizontal">
                        
                        <div class="col-sm-3 col-md-3">
                            
                            <label class="control-label" for="tipop1">Zona:</label>
                            <select name="xruta" class="form-control" value="" id="tipop1">
                                <option value="">--Opci&oacute;n--</option>
                            <?php
                                    $conexion= new Conexion();
                                    $sql= " select * from tbl_zonas";
                                    $result = mysqli_query($conexion->getConexion(),$sql);
                                    while ($ruta=mysqli_fetch_array($result)) {
                             
                                        echo '<option value="'.$ruta['numero_zona'].' ">'.$ruta['numero_zona'].'</option>';
                            
                                    }
                            ?>
                            </select>
                        </div>
                             <div class="col-sm-3 col-md-3">
                                                
                                <label class="control-label" for="bd-desde">Fecha inicial:</label>
                                <div class="">
                                    <input class="form-control" id="bd-desde" name="bd-desde" type="date" value="" >
                                    
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">

                                <label class="control-label" for="bd-hasta">Fecha final:</label>
                                <div class="">
                                    <input class="form-control" id="bd-hasta" name="bd-hasta" type="date" value="" >
                                </div>
                                
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <button class="btn btn-info " name="Buscar" type="submit">Generar</button> 
                                <input class="btn btn-info" type="button" value="Exportar Excel" onclick="descargarExcel('dataTable');">
                            </div>

                          

                                             
                    </form>

                </div>
                <br>
		<div>
			<center><h3>Reporte de precios de comercializaci&oacute;n de productos de cacao</h3></center>
		</div>
		<div class="container-fluid">
			<div class="table-responsive">
				<table id="dataTable" class="table table-bordered ">
		<tr>
            <th colspan="6" bgcolor="skyblue">
            <CENTER>Rango de precio  venta de cacao convencional por municipio</CENTER>
            </th>
          </tr>
           <tr bgcolor="white">
              <th rowspan="4" text-align><CENTER>Origen</CENTER></td>
              <th rowspan="4"><CENTER>Producto</CENTER></td>
              <th rowspan="4"><CENTER>Unidad de venta</CENTER></td>
              <th colspan="2"><CENTER>Precios</CENTER></td>
          </tr> 
          <tr bgcolor="white">   
              <th colspan="2"><CENTER>Rango</CENTER></td>             
          </tr>     
          <tr bgcolor="white">   
              <th ><CENTER>Alto</CENTER></td>
              <th ><CENTER>Bajo</CENTER></td>
          </tr> 
           <tr bgcolor="white">   
              <th colspan="2"><CENTER>Lempiras</CENTER></td>
          </tr>     
					
						<?php
                            $conexion= new Conexion();

                            
                            $sql= "SELECT d.nombre_municipio,b.descripcion_producto,f.abreviatura,max(a.precio) alto,min(a.precio) bajo,a.fecha_ingreso_producto FROM `tbl_productores_x_producto` a 
                            inner join tbl_productos b 
                            on(a.codigo_producto=b.codigo_producto)
                            inner join tbl_productores c 
                            on(a.codigo_productor=c.codigo_productor)
                            left join tbl_municipios d 
                            on(c.codigo_municipio=d.codigo_municipio)
                            left join tbl_tipos_de_cacao e
                            on(b.codigo_tipo_cacao=e.codigo_tipo_cacao)
                            left join tbl_unidad_de_medida f
                            on(f.codigo_unidad_de_medida=e.codigo_unidad_de_medida) $where
                            group by d.nombre_municipio,b.descripcion_producto
                             ";
                            $result = mysqli_query($conexion->getConexion(),$sql);
                             
                            while ($registro2=mysqli_fetch_array($result)) {
                                 
                                echo '<tr bgcolor="white">
                                    <td>'.$registro2['nombre_municipio'].'</td>
                                    <td>'.$registro2['descripcion_producto'].'</td>
                                    <td>'.$registro2['abreviatura'].'</td>
                                    <td>'.$registro2['alto'].'</td>
                                    <td>'.$registro2['bajo'].'</td>
                                    </tr>';
                            }

                        ?>
                        
				</table>
			</div>
      <div>
      </div>
			
		</div>
		<br>
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
