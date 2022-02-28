<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');


	$bd = include_once "../Conexiones/conexion.php";
	$selectTipoP = $bd->query("SELECT idTipoPersona, tipoPersona from tipopersona");
	$tipopersona = $selectTipoP->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($tipopersona);
 ?>