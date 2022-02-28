<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: http://localhost:4200");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');

	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Allow-Headers: *");
	if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    	exit("Solo acepto peticiones PUT");
	}
	$jsonPersona = json_decode(file_get_contents("php://input"));
	if (!$jsonPersona) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("UPDATE persona SET idTipoPersona = ?, primerNombre = ?, segundoNombre = ?, 
												  apellido = ?, numeroCedula = ?, direccion = ?, telefono = ?, ciudad = ? 
												  WHERE idPersona = ?");
	$resultado = $sentencia->execute([
		$jsonPersona->idTipoPersona, $jsonPersona->primerNombre, $jsonPersona->segundoNombre, $jsonPersona->apellido, 
		$jsonPersona->numeroCedula, $jsonPersona->direccion, $jsonPersona->telefono, $jsonPersona->ciudad, 
		$jsonPersona->idPersona
	]);
	echo json_encode($resultado);
 ?>