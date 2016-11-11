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
	if (empty($_POST['codigoproductor'])){
			$errors[] = "Codigo productor  vacío";
	
		}   else if (
			!empty($_POST['codigoproductor'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$codigoproductor=intval($_POST['codigoproductor']);
		
		
		
		$sql="UPDATE tbl_productores SET estado_productor=0 WHERE codigo_productor='".$codigoproductor."'";
		$query_delete = mysqli_query($con,$sql);
			if ($query_delete){
				$messages[] = "Los datos han sido eliminados satisfactoriamente.";
				echo "Los datos han sido eliminados satisfactoriamente.";
				echo '<script> alert("Eliminado con exito") </script>';
				echo '<script> window.location="new_productor.php"; </script>';
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