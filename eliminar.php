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
	if (empty($_POST['fechaingresoproducto'])){
			$errors[] = " fecha de ingreso vacío";
	} else if (empty($_POST['codigoproductor'])){
		$errors[] = "codigo productor vacío";
	} else if (empty($_POST['codigoproducto'])){
		$errors[] = "codigo producto vacío";
	} else if (empty($_POST['cantidad'])){
		$errors[] = "cantidad vacío";
	} else if (empty($_POST['precio'])){
		$errors[] = "precio vacío";
	} else if (empty($_POST['codigotipoproduccion'])){
		$errors[] = "codigo tipo produccion vacío";
	} else if (empty($_POST['codigousuario'])){
		$errors[] = "codigo usuario vacío";
	} else if (empty($_POST['codigotipotransaccion'])){
		$errors[] = "codigo tipo transaccion vacío";
	} else if (empty($_POST['codigopuntorecoleccion'])){
		$errors[] = "codigopuntorecoleccion vacío";
	} else if (empty($_POST['comentario'])){
		$errors[] = "comentario vacío";
	} else if (empty($_POST['fecharecoleccion'])){
		$errors[] = "fecha recoleccion vacío";

		}   else if (
			!empty($_POST['fechaingresoproducto']) &&
			!empty($_POST['codigoproductor']) &&
			!empty($_POST['codigoproducto']) &&
			!empty($_POST['cantidad']) &&
			!empty($_POST['precio'])&&	
			!empty($_POST['codigotipoproduccion']) &&
			!empty($_POST['codigousuario']) &&
			!empty($_POST['codigotipotransaccion']) &&
			!empty($_POST['codigopuntorecoleccion']) &&
			!empty($_POST['comentario'])&&	
			!empty($_POST['fecharecoleccion']) 
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$fechaingresoproducto=intval($_POST['fechaingresoproducto']);
		$codigoproductor=intval($_POST['codigoproductor']);
		$codigoproducto=intval($_POST['codigoproducto']);
		$cantidad=intval($_POST['cantidad']);
		$precio=intval($_POST['precio']);
		$codigotipoproduccion=intval($_POST['codigotipoproduccion']);
		$codigousuario=intval($_POST['codigousuario']);
		$codigotipotransaccion=intval($_POST['codigotipotransaccion']);
		$codigopuntorecoleccion=intval($_POST['codigopuntorecoleccion']);
		$comentario=intval($_POST['comentario']);
		$fecharecoleccion=intval($_POST['fecharecoleccion']);
		
		
		$sql="UPDATE  tbl_productores_x_producto SET estado_producto='0' WHERE fecha_ingreso_producto LIKE '%".$_POST['fechaingresoproducto']."%'";
		$query_delete = mysqli_query($con,$sql);
			if ($query_delete){
				$messages[] = "Los datos han sido eliminados satisfactoriamente.";
				echo "Los datos han sido eliminados satisfactoriamente.";
				echo '<script> alert("Eliminado con exito") </script>';
				echo '<script> window.location="registrar.php"; </script>';
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
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