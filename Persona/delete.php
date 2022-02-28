<?php 
	include_once "../Conexiones/cors.php";
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: DELETE");
	$metodo = $_SERVER["REQUEST_METHOD"];
	if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    	exit("Solo se permite método DELETE");
	}

	if (empty($_GET["idPersona"])) {
    	exit("No hay id de persona para eliminar");
	}
	$idPersona = $_GET["idPersona"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("DELETE FROM persona WHERE idPersona = ?");
	$resultado = $sentencia->execute([$idPersona]);
	echo json_encode($resultado);
	
 ?>