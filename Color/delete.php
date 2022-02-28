<?php 
	include_once "../Conexiones/cors.php";
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: DELETE");
	$metodo = $_SERVER["REQUEST_METHOD"];
	if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    	exit("Solo se permite método DELETE");
	}

	if (empty($_GET["idColor"])) {
    	exit("No hay id de color para eliminar");
	}
	$idColor = $_GET["idColor"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("DELETE FROM color WHERE idColor = ?");
	$resultado = $sentencia->execute([$idColor]);
	echo json_encode($resultado);
	
 ?>