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
		//Inicio de arreglos
		$errores = array();
		$data = array();
		//Recibimos los datos de la vista
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			$usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
			$clave = isset($_POST['clave'])?$_POST['clave']:"";
			//Validaciones
			if(empty($usuario)){
				array_push($errores, "El usuario es requerido.");
			}
			if(empty($clave)){
				array_push($errores, "La clave es requerida.");
			}
			//arreglo de data
			$data = ["usuario" => $usuario, "clave" => $clave];
			
			// Verificar errores
			if(empty($errores)){

				//Ejecuta query
				$errores = $this->modelo->verificarClave($data);

				//NO hay errores
				if(empty($errores)){
					//creamos la sesion
					$sesion = new Sesion();
					$sesion->iniciarLogin($data);
					//Abrimos adminInicio
					header("location:".RUTA."adminInicio");
       
				}

			}

	}
	// Enviamos errores a la vista
	$datos = [
			"titulo" => "Administrativo",
			"menu" => false,
			"admin" => true,
			"errores" => $errores,
			"data" => []
		];
		$this->vista("adminVista",$datos);	
		
	}
}


?>