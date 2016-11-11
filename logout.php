<?php
session_start();
include 'conexion.php';
$conexion= new Conexion();
# conectare la base de datos
$accion="Cerro Sesion";
$fecha=date("dd/mm/YYYY");
$connect=$conexion->getConexion();
$query= "INSERT INTO tbl_bitacora values('','".$_SESSION['user']."',now(),'$accion')";
$result= mysqli_query($connect,$query);
session_destroy();
echo 'Cerraste sesión';
echo '<script> window.location="index.php"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saliendo...</title>
	<meta charset="utf-8">
</head>
<body>
<script language="javascript">location.href = "index.php";</script>
</body>
</html>