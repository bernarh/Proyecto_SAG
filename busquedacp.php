<?php 
	require_once("sentenciap.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new busquedacp();
		$r=$inst ->lista($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>