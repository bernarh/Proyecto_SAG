<?php
	session_start();
	include 'conexion.php';
	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'prueba_db');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['ruta'])){
		$errors[] = "La ruta vacío";
	} else if (empty($_POST['municipio'])){
		$errors[] = "El municipio vacío";
	} else if (empty($_POST['nombretecnico'])){
		$errors[] = "El nombre del productor vacío";
	} else if (empty($_POST['correo'])){
		$errors[] = "El correo vacío";
	} else if (empty($_POST['telefono'])){
		$errors[] = "Telefono vacio";
	} else if (empty($_POST['ubicacion'])){
		$errors[] = "ubicacion";
	}   else if (
		!empty($_POST['ruta']) && 
		!empty($_POST['telefono']) &&
		!empty($_POST['municipio']) &&
		!empty($_POST['nombretecnico']) &&
		!empty($_POST['telefono'])&&
		!empty($_POST['correo'])&&	
		!empty($_POST['ubicacion'])
	){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$ruta=mysqli_real_escape_string($con,(strip_tags($_POST["ruta"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$municipio=mysqli_real_escape_string($con,(strip_tags($_POST["municipio"],ENT_QUOTES)));
		$nombretecnico=mysqli_real_escape_string($con,(strip_tags($_POST["nombretecnico"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$ubicacion=mysqli_real_escape_string($con,(strip_tags($_POST["ubicacion"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
			$sql="INSERT INTO `tbl_productores`(`codigo_productor`, `nombre_productor`, `telefono`, `correo`, `codigo_zona`, `codigo_municipio`, `ubicacion_exacta`, `fecha_ingreso_productor`, `codigo_usuario`) VALUES ('','".$nombretecnico."','".$telefono."','".$correo."','".$ruta."','".$municipio."','".$ubicacion."',now(),'".$_SESSION['codigousuario']."')";
			$query_update = mysqli_query($con,$sql);
				if ($query_update){
					$messages[] = "Los datos han sido guardados satisfactoriamente.";
					
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