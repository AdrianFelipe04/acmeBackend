<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$jsonmarca = json_decode(file_get_contents("php://input"));
	if (!$jsonmarca) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("INSERT into marca(marca) VALUES (?)");
	$resultado = $sentencia->execute([$jsonmarca->marca]);
	echo json_encode([
    	"resultado" => $resultado,
	]);
	echo json_encode($response);
	 ?>