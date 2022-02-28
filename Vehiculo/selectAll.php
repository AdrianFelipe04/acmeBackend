<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
	header('Content-Type: application/json');

	$clasepersona = include_once "../dto/vehiculo.php";

	$bd = include_once "../Conexiones/conexion.php";
	$selectVehiculo = $bd->query("SELECT idVehiculo, placa, idColor, idMarca, idTipoVehiculo, idConductor, 
									  idPropietario from vehiculo");
	$vehiculo = $selectVehiculo->fetchAll();

	
	$selectColor = $bd->query("SELECT idColor, color from color");
	$color = $selectColor->fetchAll();

	$selectMarca = $bd->query("SELECT idMarca, marca from marca");
	$marca = $selectMarca->fetchAll();

	$selectTipoV = $bd->query("SELECT idTipoVehiculo, tipoVehiculo from tipovehiculo");
	$tipovehiculo = $selectTipoV->fetchAll();

	$selectPersona = $bd->query("SELECT idPersona, primerNombre, segundoNombre, apellido from persona");
	$persona = $selectPersona->fetchAll();
	
	$listaVehiculo = [];
	$idColor = [];
	$idMarca = [];
	$idTipoVehiculo = [];
	$idPersona1 = [];
	$idPersona2 = [];
	$idPersona3 = [];

	foreach ($color as $value) {
			$idColor[$value["idColor"]]= $value["color"];
	}
	foreach ($marca as $value) {
			$idMarca[$value["idMarca"]]= $value["marca"];
	}
	foreach ($tipovehiculo as $value) {
			$idTipoVehiculo[$value["idTipoVehiculo"]]= $value["tipoVehiculo"];
	}
	foreach ($persona as $value) {
			$idPersona1[$value["idPersona"]]= $value["primerNombre"];
	}
	foreach ($persona as $value) {
			$idPersona2[$value["idPersona"]]= $value["segundoNombre"];
	}
	foreach ($persona as $value) {
			$idPersona3[$value["idPersona"]]= $value["apellido"];
	}
	foreach ($vehiculo as $valor) {

  			$listaVehiculo[] = new vehiculoEnv($valor["idVehiculo"],$valor["placa"], $valor["idColor"], 
  				$idColor[$valor["idColor"]], $valor["idMarca"], 
  				$idMarca[$valor["idMarca"]], $valor["idTipoVehiculo"], 
  				$idTipoVehiculo[$valor["idTipoVehiculo"]], 
  				$valor["idConductor"], 
  				$idPersona1[$valor["idConductor"]], 
  				$idPersona2[$valor["idConductor"]], 
  				$idPersona3[$valor["idConductor"]],
  				$valor["idPropietario"], 
  				$idPersona1[$valor["idPropietario"]], 
  				$idPersona2[$valor["idPropietario"]], 
  				$idPersona3[$valor["idPropietario"]]);
	}

	//echo json_encode($tipopersona);


	echo json_encode($listaVehiculo);
 ?>