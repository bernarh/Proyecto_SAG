<?php
	session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Usuario | Home</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/stylesusuario.css">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="wrapper paso-1">
		<header class="header">
			<div class="contain">
				<h1><img src="imagenes/logos.png" alt="SAG" width="100%" align="center"></h1>
			</div>
		</header>
		<div class="contain content">
			<header>
				<h2>Crear Usuario</h2>
				<p>Agregando datos personales</p>
			</header>
		<div class="navbar"></div>

			<form class="form">
				<fieldset>
					<div class="col file">
						<input type="file">
					</div>

					<div class="col">
						<label>NOMBRE <span class="tooltip">?</span></label>
						<input type="text">

						<label>USUARIO <span class="tooltip">?</span></label>
						<input type="text">

						<label>EMAIL <span class="tooltip">?</span></label>
						<input type="email">
					</div>

					<div class="col">
						<label>SELECCIONA GENERO <span class="tooltip">?</span></label>
						<select></select>

						<label>CONTRASEÑA <span class="tooltip">?</span></label>
						<input type="password">

				        <label>FECHA DE NACIMIENTO <span class="tooltip">?</span></label>
						<div class="fecha_nacimiento">
							<input type="date" class="small">
							
						</div>
					</div>
					
				</fieldset>

				<input type="submit" value="Crear Usuario">

			</form>
		</div>
	</div>
	
</body>
</html>