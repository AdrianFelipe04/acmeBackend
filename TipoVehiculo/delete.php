<?php 
	include_once "../Conexiones/cors.php";
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: DELETE");
	$metodo = $_SERVER["REQUEST_METHOD"];
	if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    	exit("Solo se permite método DELETE");
	}

	if (empty($_GET["idTipoVehiculo"])) {
    	exit("No hay id de tipo de vehiculo para eliminar");
	}
	$idTipoVehiculo = $_GET["idTipoVehiculo"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("DELETE FROM tipovehiculo WHERE idTipoVehiculo = ?");
	$resultado = $sentencia->execute([$idTipoVehiculo]);
	echo json_encode($resultado);
	
 ?>