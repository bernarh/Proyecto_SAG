<?php
	session_start();
	include 'conexion.php';
	if(isset($_SESSION['user'])){
	echo '<script> window.location="menu.php"; </script>';
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="estilos.css">
<title>Login</title>
<style type="text/css">
#caja{
	background: transparent;
	width:300px;
	border: 3px solid white;
	margin: 150px auto;
	padding: 1em;
	border-radius: 20px;
	position:center;
	right:20px;

}
h1,h2,h3,h4{
	font-family: arial;
	color: white;
}
input[type=text],input[type=password]{
	margin: 0 0 1em 0;
	width: 295px;
	border:0px;
	padding: 1em;
	border-radius: 3px 3px 8px 8px;
}
input[type=submit],form a{
	padding:1em;
	background: transparent;
	border:none;
	color:white;
	font-family: arial black;
	font-size: 14px;
	border-radius: 3px; 
	text-decoration: none;
}
input[type=submit]:hover, form a:hover{
	background: #499950;
	cursor:pointer;
}
body
{
	background: url(imagenes/fondo.jpg) no-repeat fixed center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
</head>
<body>
	<div id="caja" >
		<h1>Ingreso</h1>
<br>
	<form action="validar.php" method="post">
		<input type="text" name="user" required placeholder="USERNAME"/>
		<input type="password" name="pw" required placeholder="PASS"/>
		<input type="submit" name="login" value="Entrar"/>
	</form>
</div>
</body>
</html>