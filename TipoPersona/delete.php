<?php 
	include_once "../Conexiones/cors.php";
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: DELETE");
	$metodo = $_SERVER["REQUEST_METHOD"];
	if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    	exit("Solo se permite método DELETE");
	}

	if (empty($_GET["idTipoPersona"])) {
    	exit("No hay id de tipo de persona para eliminar");
	}
	$idTipoPersona = $_GET["idTipoPersona"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("DELETE FROM tipopersona WHERE idTipoPersona = ?");
	$resultado = $sentencia->execute([$idTipoPersona]);
	echo json_encode($resultado);
	
 ?>