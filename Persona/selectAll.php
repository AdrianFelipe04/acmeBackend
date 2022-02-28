<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$clasepersona = include_once "../dto/persona.php";

	$bd = include_once "../Conexiones/conexion.php";
	$selectPersona = $bd->query("SELECT idPersona, idTipoPersona, primerNombre, segundoNombre, apellido, numeroCedula, 
									  direccion, telefono, ciudad from persona");
	$persona = $selectPersona->fetchAll();



	$selectTipoP = $bd->query("SELECT idTipoPersona, tipoPersona from tipopersona");
	$tipopersona = $selectTipoP->fetchAll();
	
	$listaPersona = [];
	$idTipoPersona = [];
	//echo $persona[0]["idPersona"];
	foreach ($tipopersona as $value) {
			$idTipoPersona[$value["idTipoPersona"]]= $value["tipoPersona"];
	}
	foreach ($persona as $valor) {

  			$listaPersona[] = new personaEnv($valor["idPersona"], $valor["idTipoPersona"], $idTipoPersona[$valor["idTipoPersona"]], 
   							$valor["primerNombre"], $valor["segundoNombre"], $valor["apellido"], $valor["numeroCedula"], 
   							$valor["direccion"], $valor["telefono"], $valor["ciudad"]);
	}

	//echo json_encode($tipopersona);


	echo json_encode($listaPersona);


?>