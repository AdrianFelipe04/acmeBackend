<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	if (empty($_GET["idTipoVehiculo"])) {
    	exit("No hay id de tipo de vehiculo");
	}
	$idTipoVehiculo = $_GET["idTipoVehiculo"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("SELECT idTipoVehiculo, tipoVehiculo from tipovehiculo where idTipoVehiculo = ?");
	$sentencia->execute([$idTipoVehiculo]);
	$tipoV = $sentencia->fetchObject();
	echo json_encode($tipoV);
 ?>