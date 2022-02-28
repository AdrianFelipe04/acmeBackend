<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$jsonvehiculo = json_decode(file_get_contents("php://input"));
	if (!$jsonvehiculo) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("INSERT into vehiculo(placa, idColor, idMarca, idTipoVehiculo, idConductor, 
										   idPropietario) VALUES (?, ?, ?, ?, ?, ?)");
	$resultado = $sentencia->execute([$jsonvehiculo->placa, $jsonvehiculo->idColor, $jsonvehiculo->idMarca, 
									  $jsonvehiculo->idTipoVehiculo, $jsonvehiculo->idConductor, $jsonvehiculo->idPropietario]);
	echo json_encode(["resultado" => $resultado]);
	echo json_encode($response);
?>