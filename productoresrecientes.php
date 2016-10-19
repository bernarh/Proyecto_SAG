<?php
	session_start();
	include 'conexion.php';
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root','', 'prueba_db');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM tbl_productores_x_producto ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT codigo_productor, nombre_productor, telefono, codigo_zona, codigo_municipio, ubicacion_exacta, fecha_ingreso_productor, codigo_usuario FROM tbl_productores WHERE codigo_usuario= '".$_SESSION['codigousuario']."' order by fecha_ingreso_productor desc limit 5");
		
		if ($numrows>0){
			?>
		
		<table class="table table-bordered table-hover ">
		<div class="container">
		<div class="table-responsive">
			  <thead>
				<tr class="success" >
					<th>C&oacute;digo Productor</th>
					<th>Nombre Productor</th>
					<th>Telefono</th>
					<th>Fecha de ingreso</th>
					<th>ubicacion_exacta</th>
					<th>Codigo Zona</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr class="success">
					<td><?php echo $row['codigo_productor'];?></td>
					<td><?php echo $row['nombre_productor'];?></td>
					<td><?php echo $row['telefono'];?></td>
					<td><?php echo $row['fecha_ingreso_productor'];?></td>
					<td><?php echo $row['ubicacion_exacta'];?></td>
					<td><?php echo $row['codigo_zona'];?></td>
				</tr>
				<?php
			}
			?>
			</tbody>
			</div>
			</div>

		</table>
		</div>
		<div class="table-pagination pull-right">
		</div>
		
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>