<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	if (empty($_GET["idColor"])) {
    	exit("No hay id de color");
	}
	$idColor = $_GET["idColor"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("SELECT idColor, color from color where idColor = ?");
	$sentencia->execute([$idColor]);
	$color = $sentencia->fetchObject();
	echo json_encode($color);
 ?>