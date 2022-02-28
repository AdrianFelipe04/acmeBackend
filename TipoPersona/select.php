<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	if (empty($_GET["idTipoPersona"])) {
    	exit("No hay id de tipo de persona");
	}
	$idTipoPersona = $_GET["idTipoPersona"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("SELECT idTipoPersona, tipoPersona from tipopersona where idTipoPersona = ?");
	$sentencia->execute([$idTipoPersona]);
	$tipoP = $sentencia->fetchObject();
	echo json_encode($tipoP);
 ?>