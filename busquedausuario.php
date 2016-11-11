<?php 
	require_once("sentenciausuario.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new busquedausuario();
		$r=$inst ->lista($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>