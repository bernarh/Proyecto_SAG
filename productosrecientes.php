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
		$query = mysqli_query($con,"SELECT pxp.codigo_producto, pxp.cantidad, pxp.precio, pxp.fecha_ingreso_producto, p.descripcion_producto, ptr.nombre_productor FROM tbl_productores_x_producto pxp inner join tbl_productos p on (pxp.codigo_producto= p.codigo_producto) inner join tbl_productores ptr on (pxp.codigo_productor= ptr.codigo_productor) WHERE codigo_usuario= '".$_SESSION['codigousuario']."' order by pxp.fecha_ingreso_producto desc limit 5");
		
		if ($numrows>0){
			?>
		
		<table class="table table-bordered table-hover ">
		<div class="container">
		<div class="table-responsive">
			  <thead>
				<tr class="success" >
					<th>C&oacute;digo Producto</th>
					<th>Tipo de Producto</th>
					<th>Fecha de ingreso</th>
					<th>Nombre Productor</th>
					<th>Precio</th>
					<th>Volumen</th>
					<th>Actividad</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr class="success">
					<td><?php echo $row['codigo_producto'];?></td>
					<td><?php echo $row['descripcion_producto'];?></td>
					<td><?php echo $row['fecha_ingreso_producto'];?></td>
					<td><?php echo $row['nombre_productor'];?></td>
					<td><?php echo $row['precio'];?></td>
					<td><?php echo $row['cantidad'];?></td>
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-codigo="<?php echo $row['codigo_producto']?>" data-descripcion="<?php echo $row['descripcion_producto']?>" data-nombre=" <?php echo $row['nombre_productor']?>" ><i class='glyphicon glyphicon-edit'></i></button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['codigo_producto']?>"  ><i class='glyphicon glyphicon-trash'></i></button>
					</td>
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