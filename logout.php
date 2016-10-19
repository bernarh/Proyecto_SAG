<?php
session_start();
$hostname ="localhost";
$username= "root";
$pass="";
$db="prueba_db";
$accion="Cerro Sesion";
$fecha=date("dd/mm/YYYY");
$connect=mysqli_connect($hostname,$username,$pass,$db);
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