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
        if(empty($_POST['xruta']) and empty($_POST['bd-desde'])){
            $where="where A.fecha_ingreso_producto <= '".$fechafin."' ";
                                                   

        }else if(empty($_POST['bd-hasta']) and empty($_POST['xruta'])){
            $where="where A.fecha_ingreso_producto >= '".$fechaini."' ";
            
            
              }else if(empty($_POST['bd-hasta']) and empty($_POST['bd-desde'])){
                        $where= "where I.ubicacion='".$zona."' ";

                    }else if(empty($_POST['xruta']) ){
                               $where="where A.fecha_ingreso_producto between '".$fechaini."' AND '".$fechafin."' ";

                            }else if(empty($_POST['bd-desde']) ){
                                        $where="where I.ubicacion='".$zona."' AND A.fecha_ingreso_producto <= '".$fechafin."' ";

                                    }else if(empty($_POST['bd-hasta']) ){
                                               $where="where I.ubicacion='".$zona."' AND A.fecha_ingreso_producto >= '".$fechaini."' ";

                                            }else {
                                                        $where="where I.ubicacion='".$zona."' AND A.fecha_ingreso_producto between '".$fechaini."' AND '".$fechafin."' ";
                                                        
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
                    <form method="POST" class="form-horizontal">
                        
                        <div class="col-sm-3 col-md-3">
                            
                            <label class="control-label" for="tipop1">Ruta:</label>
                            <select name="xruta" class="form-control" value="" id="tipop1">
                                <option value="">--Opci&oacute;n--</option>
                            <?php
                                    $conexion= new Conexion();
                                    $sql= " select * from tbl_zonas";
                                    $result = mysqli_query($conexion->getConexion(),$sql);
                                    while ($ruta=mysqli_fetch_array($result)) {
                             
                                        echo '<option value="'.$ruta['ubicacion'].' ">'.$ruta['ubicacion'].'</option>';
                            
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
                                <button class="btn btn-info " name="Buscar" type="submit">Buscar</button> 
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
                        <th>Tipo de producto</th>
                        <th>Precio</th>
                        <th>Volumen</th>
                        <th>Comentarios</th>
                        <th>Seleccionar</th>
					</tr>
					
						<?php
                            $conexion= new Conexion();
                            
                            $sql= "SELECT A.fecha_recoleccion, c.nombre_municipio ,B.nombre_productor, 
                                    H.punto_recoleccion, D.tipo_transaccion,E.tipo_produccion, 
                                    CONCAT(F.descripcion_producto,' ',J.nombre_tipo_cacao) as nombre_tipo_cacao , 
                                    CONCAT('Lps.',' ',A.precio) AS precio, 
                                    CONCAT(A.cantidad,' ',G.abreviatura) AS volumen, A.comentario 
                                    FROM tbl_productores_x_producto A 
                                    INNER JOIN tbl_productores B
                                    ON (A.codigo_productor=B.codigo_productor)
                                    INNER JOIN tbl_municipios C 
                                    ON(B.codigo_municipio=C.codigo_municipio)
                                    INNER JOIN tbl_tipo_transaccion D 
                                    ON (A.codigo_tipo_transaccion=D.codigo_tipo_transaccion)
                                    INNER JOIN tbl_codigo_tipo_produccion E 
                                    ON (A.codigo_tipo_produccion=E.codigo_tipo_produccion)
                                    INNER JOIN tbl_productos F 
                                    ON (A.codigo_producto=F.codigo_producto)
                                    INNER JOIN tbl_tipos_de_cacao J 
                                    ON (F.codigo_tipo_cacao=J.codigo_tipo_cacao)
                                    INNER JOIN tbl_unidad_de_medida G 
                                    ON (J.codigo_unidad_de_medida=G.codigo_unidad_de_medida)
                                    INNER JOIN tbl_punto_recoleccion H 
                                    ON (A.codigo_punto_recoleccion=H.codigo_punto_recoleccion)
                                    INNER JOIN tbl_zonas I
                                    ON (B.codigo_zona=I.codigo_zona) $where";
                                            
                            
                            $result = mysqli_query($conexion->getConexion(),$sql);
                             
                            while ($registro2=mysqli_fetch_array($result)) {
                                 
                                echo '<tr class="active">
                                    <td>'.$conexion->fechaNormal($registro2['fecha_recoleccion']).'</td>
                                    <td>'.$registro2['nombre_municipio'].'</td>
                                    <td>'.$registro2['nombre_productor'].'</td>
                                    <td>'.$registro2['punto_recoleccion'].'</td>
                                    <td>'.$registro2['tipo_transaccion'].'</td>
                                    <td>'.$registro2['tipo_produccion'].'</td>
                                    <td>'.$registro2['nombre_tipo_cacao'].'</td>
                                    <td>'.$registro2['precio'].'</td>
                                    <td>'.$registro2['volumen'].'</td>
                                    <td>'.$registro2['comentario'].'</td>
                                    <td><input type="checkbox" name="chk"/></td>
                                    </tr>';
                            }

                        ?>
                        
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
