<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');


	$bd = include_once "../Conexiones/conexion.php";
	$selectMarca = $bd->query("SELECT idMarca, marca from marca");
	$marca = $selectMarca->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($marca);
 ?>