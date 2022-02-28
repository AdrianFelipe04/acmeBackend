<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	if (empty($_GET["idVehiculo"])) {
    	exit("No hay id de vehiculo");
	}
	$idVehiculo = $_GET["idVehiculo"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("SELECT idVehiculo, placa, idColor, idMarca, idTipoVehiculo, idConductor, 
									  idPropietario from vehiculo where idVehiculo = ?");
	$sentencia->execute([$idVehiculo]);
	$vehiculo = $sentencia->fetchObject();
	echo json_encode($vehiculo);
 ?>