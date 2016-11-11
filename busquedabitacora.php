<?php 
	require_once("sentenciab.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new busquedab();
		$r=$inst ->lista($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>