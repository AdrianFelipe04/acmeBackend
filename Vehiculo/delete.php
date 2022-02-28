<?php 
	include_once "../Conexiones/cors.php";
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: DELETE");
	$metodo = $_SERVER["REQUEST_METHOD"];
	if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    	exit("Solo se permite método DELETE");
	}

	if (empty($_GET["idVehiculo"])) {
    	exit("No hay id de vehiculo para eliminar");
	}
	$idVehiculo = $_GET["idVehiculo"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("DELETE FROM vehiculo WHERE idVehiculo = ?");
	$resultado = $sentencia->execute([$idVehiculo]);
	echo json_encode($resultado);
	
 ?>