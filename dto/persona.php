<?php  
Class personaEnv{
		public $idPersona;
		public $idTipoPersona;
		public $tipoPersona;
		public $primerNombre;
		public $segundoNombre;
		public $apellido;
		public $numeroCedula;
		public $direccion;
		public $telefono;
		public $ciudad;

		function __construct($idPersona, $idTipoPersona, $tipoPersona, $primerNombre, $segundoNombre, $apellido, 
			$numeroCedula, $direccion, $telefono, $ciudad)
	{
		$this->idPersona=$idPersona;
		$this->idTipoPersona=$idTipoPersona;
		$this->tipoPersona=$tipoPersona;
		$this->primerNombre=$primerNombre;
		$this->segundoNombre=$segundoNombre;
		$this->apellido=$apellido;
		$this->numeroCedula=$numeroCedula;
		$this->direccion=$direccion;
		$this->telefono=$telefono;
		$this->ciudad=$ciudad;
	}

	//función para obtener todos los usuarios
	
}
?>
