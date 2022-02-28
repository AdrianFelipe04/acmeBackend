<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: http://localhost:4200");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');

	header("Access-Control-Allow-Methods: PUT");
	header("Access-Control-Allow-Headers: *");
	if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    	exit("Solo acepto peticiones PUT");
	}
	$jsonMarca = json_decode(file_get_contents("php://input"));
	if (!$jsonMarca) {
    	exit("No hay datos");
	}
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("UPDATE marca SET marca = ? WHERE idMarca = ?");
	$resultado = $sentencia->execute([$jsonMarca->marca, $jsonMarca->idMarca]);
	echo json_encode($resultado);
 ?>