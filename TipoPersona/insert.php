<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$jsontipopersona = json_decode(file_get_contents("php://input"));
	if (!$jsontipopersona) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("INSERT into tipopersona(tipoPersona) VALUES (?)");
	$resultado = $sentencia->execute([$jsontipopersona->tipoPersona]);
	echo json_encode([
    	"resultado" => $resultado,
	]);
	echo json_encode($response);
	 ?>