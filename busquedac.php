<?php 
	require_once("sentencia.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new busquedac();
		$r=$inst ->lista($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>