<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: http://localhost:4200");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');

	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Allow-Headers: *");
	if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    	exit("Solo acepto peticiones PUT");
	}
	$jsonVehiculo = json_decode(file_get_contents("php://input"));
	if (!$jsonVehiculo) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("UPDATE vehiculo SET placa = ?, idColor = ?, idMarca = ?, 
												  idTipoVehiculo = ?, idConductor = ?, idPropietario = ? 
												  WHERE idVehiculo = ?");
	$resultado = $sentencia->execute([
		$jsonVehiculo->placa, $jsonVehiculo->idColor, $jsonVehiculo->idMarca, $jsonVehiculo->idTipoVehiculo, 
		$jsonVehiculo->idConductor, $jsonVehiculo->idPropietario, $jsonVehiculo->idVehiculo
	]);
	echo json_encode($resultado);
 ?>
