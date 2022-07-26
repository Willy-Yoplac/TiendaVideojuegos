<?php
/**
 * Controlador de usuarios Administrativos
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
    //insertar 
	public function alta()
  {
    if ($_SERVER['REQUEST_METHOD']=="POST") {
      $errores = array();
	  $data = array();
      $usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
      $clave1 = isset($_POST['clave1'])?$_POST['clave1']:"";
      $clave2 = isset($_POST['clave2'])?$_POST['clave2']:"";
      $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
      //Validacion
      if(empty($usuario)){
        array_push($errores,"El usuario es requerido.");
      }
      if(empty($clave1)){
        array_push($errores,"La clave de acceso es requerida.");
      }
      if(empty($clave2)){
        array_push($errores,"La verificación de la clave de acceso es requerida.");
      }
      if($clave1!=$clave2){
        array_push($errores,"Las claves deben coincidir.");
      }
      if(empty($nombre)){
        array_push($errores,"El nombre del usuario es requerido.");
      }
	  // Arreglo de datos
	  $data = [
		"nombre" => $nombre,
		"clave1" => $clave1,
		"clave2" => $clave2,
		"usuario" => $usuario
	  ];
      //Si no hay errores
      if (empty($errores)) {
        if($this->modelo->insertarDatos($data)){

		}else{

		}
      } else {
        $datos = [
        "titulo" => "Administrativo Usuarios Alta",
        "menu" => false,
        "admon" => true,
        "errores" => $errores,
		"data" => $data
        
      ];
      $this->vista("adminUsuariosVista",$datos);
      }
    } else {
      $datos = [
        "titulo" => "Administrativo Usuarios Alta",
        "menu" => false,
        "admon" => true,
        "data" => []
      ];
      $this->vista("adminUsuariosVista",$datos);
    }
	
  }
    //eliminar
	public function baja()
	{
		print "Usuarios admin baja";
	}
    //actualizar
	public function cambio()
	{
		print "Usuarios admin cambio";
	}
}


?>