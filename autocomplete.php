<?php
header( 'Content-type: text/html; charset=iso-8859-1' );
require('Conexion.php');
$search = $_POST['nombretecnico'];
$con= new conexion();
$conexion= $con->getConexion();
$query_services = mysqli_query($conexion,"SELECT * FROM tbl_productores WHERE codigo_productor =  '$search'  and estado_productor=1");
while ($row_nombres = mysqli_fetch_array($query_services)) {
    echo '<div class="suggest-element" ><a data="'.$row_nombres['codigo_productor'].'" id="nombretecnico'.$row_nombres['codigo_productor'].'">'.utf8_encode($row_nombres['codigo_productor']) ." ".utf8_encode($row_nombres['nombre_productor'])." ".utf8_encode($row_nombres['telefono']).'</a></div>';
}
?>
