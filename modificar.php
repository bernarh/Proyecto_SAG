<?php
	session_start();
	include 'conexion.php';
	$conexion= new Conexion();
	# conectare la base de datos
    $con=@$conexion->getConexion();
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['nombreproductor'])){
		$errors[] = "nombre productor vacío";
	} else if (empty($_POST['tipoproduccion'])){
		$errors[] = "Tipo produccion vacio";
	} else if (empty($_POST['tipoproducto'])){
		$errors[] = "Tipo producto vacio";
	} else if (empty($_POST['precio'])){
		$errors[] = "Precio del producto vacio";
	} else if (empty($_POST['volumen'])){
		$errors[] = "Volumen del producto vacio";
	} else if ($_POST['precio']<=0){
		$errors[] = "Precio del producto debe ser mayor a cero";
	} else if ($_POST['volumenproducto']<=0){
		$errors[] = "Volumen del producto debe ser mayor a cero";
	} else if (!is_int($_POST['volumenproducto']){
		$errors[] = "Volumen del producto debe ser entero";
	} else if (empty($_POST['comentario'])){
		$errors[] = "comentario vacio";
	}   else if (
		!empty($_POST['nombreproductor']) && 
		!empty($_POST['tipoproduccion'])&&	
		!empty($_POST['tipoproducto']) &&
		!empty($_POST['precio']) &&
		!empty($_POST['volumen'])&&
		!empty($_POST['comentario'])		
	){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombretecnico=mysqli_real_escape_string($con,(strip_tags($_POST["nombreproductor"],ENT_QUOTES)));
		//$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		//$fecharecoleccioni=mysqli_real_escape_string($con,(strip_tags($_POST["fecharecoleccioni"],ENT_QUOTES)));
		//$fecharecoleccionf=mysqli_real_escape_string($con,(strip_tags($_POST["fecharecoleccionf"],ENT_QUOTES)));
		//$fechaingreso=mysqli_real_escape_string($con,(strip_tags($_POST["fechaingreso"],ENT_QUOTES)));
		//$puntorecoleccion=mysqli_real_escape_string($con,(strip_tags($_POST["puntorecoleccion"],ENT_QUOTES)));
		//$tipotransaccion=mysqli_real_escape_string($con,(strip_tags($_POST["tipotransaccion"],ENT_QUOTES)));
		$tipoproduccion=mysqli_real_escape_string($con,(strip_tags($_POST["tipoproduccion"],ENT_QUOTES)));
		$tipoproducto=mysqli_real_escape_string($con,(strip_tags($_POST["tipoproducto"],ENT_QUOTES)));
		$precio=mysqli_real_escape_string($con,(strip_tags($_POST["precio"],ENT_QUOTES)));
		$volumenproducto=mysqli_real_escape_string($con,(strip_tags($_POST["volumen"],ENT_QUOTES)));
		$comentario=mysqli_real_escape_string($con,(strip_tags($_POST["comentario"],ENT_QUOTES)));
		
		/* crear una sentencia preparada */
		$sentencia = mysqli_stmt_init($con);
		if (mysqli_stmt_prepare($sentencia, 'SELECT codigo_productor FROM tbl_productores WHERE nombre_productor=?')) {

		    /* vincular los parámetros para los marcadores */
		    mysqli_stmt_bind_param($sentencia, "s", $nombretecnico);

		    /* ejecutar la consulta */
		    mysqli_stmt_execute($sentencia);

		    /* vincular las variables de resultados */
		    mysqli_stmt_bind_result($sentencia, $codigoProductor);

		    /* obtener el valor */
		    mysqli_stmt_fetch($sentencia);

		    /* cerrar la sentencia */
		    mysqli_stmt_close($sentencia);
		}

		
		if ($codigoProductor==0){
			$errors []= "Error no existe el productor que intenta agregar.";
		}else{
			// prepare and bind
			/*$stmt = $conn->prepare("INSERT INTO `tbl_productores_x_producto`(`codigo_productor`, `codigo_producto`, `cantidad`, `precio`, `fecha_ingreso_producto`, `codigo_tipo_produccion`) VALUES  (?,?,?,?,?,?)");
			$stmt->bind_param("iiidsi", $codigoProductor,$tipoproducto, $volumenproducto,$precio,$fechaingreso,$tipoproduccion);

			// set parameters and execute
			$stmt->execute();
			*/
			$sql="INSERT INTO `tbl_productores_x_producto`(`codigo_productor`, `codigo_producto`, `cantidad`, `precio`, `fecha_ingreso_producto`, `codigo_tipo_produccion`, `codigo_usuario`, `comentario`) VALUES  ('".$codigoProductor."','".$tipoproducto."','".$volumenproducto."','".$precio."',now(),'".$tipoproduccion."','".$_SESSION['codigousuario']."','".$comentario."')";
			$query_update = mysqli_query($con,$sql);
				if ($query_update){
					$messages[] = "Los datos han sido guardados satisfactoriamente.";
				} else{
					$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
				}
		}
		
	} else {
		$errors []= "Error desconocido.";
	}
		
	if (isset($errors)){
		
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
		}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>