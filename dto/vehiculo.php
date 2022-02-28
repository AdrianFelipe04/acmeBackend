<?php  
Class vehiculoEnv{
		public $idVehiculo;
		public $placa;
		public $idColor;
		public $color;
		public $idMarca;
		public $marca;
		public $idTipoVehiculo;
		public $tipoVehiculo;
		public $idConductor;
		public $primerNombreConductor;
		public $segundoNombreConductor;
		public $apellidoConductor;
		public $idPropietario;
		public $primerNombrePropietario;
		public $segundoNombrePropietario;
		public $apellidoPropietario;

		function __construct($idVehiculo, $placa, $idColor, $color, $idMarca, $marca, 
			$idTipoVehiculo, $tipoVehiculo, $idConductor, $primerNombreConductor, $segundoNombreConductor, 
			$apellidoConductor, $idPropietario, $primerNombrePropietario, $segundoNombrePropietario, 
			$apellidoPropietario)
	{
		$this->idVehiculo=$idVehiculo;
		$this->placa=$placa;
		$this->idColor=$idColor;
		$this->color=$color;
		$this->idMarca=$idMarca;
		$this->marca=$marca;
		$this->idTipoVehiculo=$idTipoVehiculo;
		$this->tipoVehiculo=$tipoVehiculo;
		$this->idConductor=$idConductor;
		$this->primerNombreConductor=$primerNombreConductor;
		$this->segundoNombreConductor=$segundoNombreConductor;
		$this->apellidoConductor=$apellidoConductor;
		$this->idPropietario=$idPropietario;
		$this->primerNombrePropietario=$primerNombrePropietario;
		$this->segundoNombrePropietario=$segundoNombrePropietario;
		$this->apellidoPropietario=$apellidoPropietario;
	}
	
}
?>
