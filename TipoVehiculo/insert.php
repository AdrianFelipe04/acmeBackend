<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$jsontipovehiculo = json_decode(file_get_contents("php://input"));
	if (!$jsontipovehiculo) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("INSERT into tipovehiculo(tipoVehiculo) VALUES (?)");
	$resultado = $sentencia->execute([$jsontipovehiculo->tipoVehiculo]);
	echo json_encode([
    	"resultado" => $resultado,
	]);
	echo json_encode($response);
	 ?>