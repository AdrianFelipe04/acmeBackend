<?php 
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	if (empty($_GET["idPersona"])) {
    	exit("No hay id de persona");
	}
	$idPersona = $_GET["idPersona"];
	$bd = include_once "../Conexiones/conexion.php";
	$sentencia = $bd->prepare("SELECT idPersona, idTipoPersona, primerNombre, segundoNombre, apellido, numeroCedula, 
									  direccion, telefono, ciudad from persona where idPersona = ?");
	$sentencia->execute([$idPersona]);
	$persona = $sentencia->fetchObject();
	echo json_encode($persona);
 ?>