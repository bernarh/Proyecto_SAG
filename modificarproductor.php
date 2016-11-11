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
	 if (empty($_POST['ruta'])){
		$errors[] = "La ruta vacío";
	} else if (empty($_POST['municipio'])){
		$errors[] = "El municipio vacío";
	} else if (empty($_POST['codigotecnico'])){
		$errors[] = "El codigo del tecnico vacío";
	} else if (empty($_POST['nombretecnico'])){
		$errors[] = "El nombre del productor vacío";
	} else if (empty($_POST['telefono'])){
		$errors[] = "Telefono vacio";
	} else if (empty($_POST['ubicacion'])){
		$errors[] = "ubicacion vacia";
	} else if (empty($_POST['correo'])){
		$errors[] = "correo vacio";
	}   else if (
		!empty($_POST['ruta']) && 
		!empty($_POST['telefono']) &&
		!empty($_POST['municipio']) &&
		!empty($_POST['nombretecnico']) &&
		!empty($_POST['codigotecnico'])&&
		!empty($_POST['correo'])&&
		!empty($_POST['ubicacion'])
	){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$ruta=mysqli_real_escape_string($con,(strip_tags($_POST["ruta"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$municipio=mysqli_real_escape_string($con,(strip_tags($_POST["municipio"],ENT_QUOTES)));
		$nombretecnico=mysqli_real_escape_string($con,(strip_tags($_POST["nombretecnico"],ENT_QUOTES)));
		$codigotecnico=mysqli_real_escape_string($con,(strip_tags($_POST["codigotecnico"],ENT_QUOTES)));
		$ubicacion=mysqli_real_escape_string($con,(strip_tags($_POST["ubicacion"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));	

			$sql="UPDATE tbl_productores SET nombre_productor='".$nombretecnico."', telefono='".$telefono."',correo='".$correo."',codigo_zona='".$ruta."',codigo_municipio='".$municipio."',ubicacion_exacta='".$ubicacion."' WHERE codigo_productor='".$codigotecnico."'";
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