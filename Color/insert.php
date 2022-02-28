<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$jsoncolor = json_decode(file_get_contents("php://input"));
	if (!$jsoncolor) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("INSERT into color(color) VALUES (?)");
	$resultado = $sentencia->execute([$jsoncolor->color]);
	echo json_encode([
    	"resultado" => $resultado,
	]);
	echo json_encode($response);
	 ?>