<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])) {?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
</head>
<body>
<div>
  <article>
    <p> 
        Acceso Correcto, Bienvenido Supervisor
    </p>
  </article>
<div align="right">
  <a href="logout.php"><button>Salir</button></a>
</div>
</div>
</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>