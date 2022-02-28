<?php 
	include_once "../Conexiones/cors.php";
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: DELETE");
	$metodo = $_SERVER["REQUEST_METHOD"];
	if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    	exit("Solo se permite método DELETE");
	}

	if (empty($_GET["idMarca"])) {
    	exit("No hay id de marca para eliminar");
	}
	$idMarca = $_GET["idMarca"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("DELETE FROM marca WHERE idMarca = ?");
	try {
		$resultado = $sentencia->execute([$idMarca]);
	} catch (Exception $e) {
    	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    	echo json_encode($e->getMessage());
	}
	//$resultado = $sentencia->execute([$idMarca]);
	echo json_encode($resultado);
	
 ?>