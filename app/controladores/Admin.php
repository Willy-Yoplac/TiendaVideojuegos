<?php

/**
 * Controlador administrativo
 */
class Admin extends Controlador{
	private $modelo;

	function __construct(){
		$this->modelo = $this->modelo("AdminModelo");
	}

	public function caratula()
	{
		$datos = [
			"titulo" => "Administrativo",
			"menu" => false,
			"data" => []
		];
		$this->vista("adminVista",$datos);
	}

	public function verifica()
	{
		$datos = [
			"titulo" => "Administrativo Inicio",
			"menu" => false,
			"admin" => true,
			"data" => []
		];
		$this->vista("adminInicioVista",$datos);
	}
}


?>