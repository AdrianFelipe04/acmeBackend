<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: http://localhost:4200");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');

	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Allow-Headers: *");
	if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    	exit("Solo acepto peticiones PUT");
	}
	$jsonTipoVehiculo = json_decode(file_get_contents("php://input"));
	if (!$jsonTipoVehiculo) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("UPDATE tipovehiculo SET tipoVehiculo = ? WHERE idTipoVehiculo = ?");
	$resultado = $sentencia->execute([$jsonTipoVehiculo->tipoVehiculo, $jsonTipoVehiculo->idTipoVehiculo]);
	echo json_encode($resultado);
 ?>