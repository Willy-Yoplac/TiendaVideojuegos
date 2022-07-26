<?php
/**
 * Controlador de usuarios Admin
 */
class AdminUsuarios extends Controlador{
	private $modelo;

	function __construct()
	{
		$this->modelo = $this->modelo("AdminUsuariosModelo");
	}

	public function caratula()
	{
		$datos = [
			"titulo" => "Administrativo Usuarios",
			"menu" => false,
			"admin" => true,
			"data" => []
		];
		$this->vista("adminUsuariosCaratulaVista",$datos);
	}

	public function alta()
	{
		$datos = [
			"titulo" => "Administrativo Usuarios Alta",
			"menu" => false,
			"admin" => true,
			"data" => []
		];
		$this->vista("adminUsuariosVista",$datos);
	}

	public function baja()
	{
		print "Usuarios admin baja";
	}

	public function cambio()
	{
		print "Usuarios admin cambio";
	}
}


?>