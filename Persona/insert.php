<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$jsonpersona = json_decode(file_get_contents("php://input"));
	if (!$jsonpersona) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("INSERT into persona(idTipoPersona, primerNombre, segundoNombre, apellido, numeroCedula, 
										   direccion, telefono, ciudad) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$resultado = $sentencia->execute([$jsonpersona->idTipoPersona, $jsonpersona->primerNombre, $jsonpersona->segundoNombre, 
									  $jsonpersona->apellido, $jsonpersona->numeroCedula, $jsonpersona->direccion, 
									  $jsonpersona->telefono, $jsonpersona->ciudad]);
	echo json_encode(["resultado" => $resultado]);
	echo json_encode($response);
?>