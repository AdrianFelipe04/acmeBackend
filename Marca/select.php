<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	if (empty($_GET["idMarca"])) {
    	exit("No hay id de marca");
	}
	$idMarca = $_GET["idMarca"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("SELECT idMarca, marca from marca where idMarca = ?");
	$sentencia->execute([$idMarca]);
	$marca = $sentencia->fetchObject();
	echo json_encode($marca);
 ?>