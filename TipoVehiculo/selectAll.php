<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');


	$bd = include_once "../Conexiones/conexion.php";
	$selectTipoV = $bd->query("SELECT idTipoVehiculo, tipoVehiculo from tipovehiculo");
	$tipovehiculo = $selectTipoV->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($tipovehiculo);
 ?>