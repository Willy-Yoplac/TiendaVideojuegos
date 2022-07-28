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
    //Creamos sesion
    $sesion = new Sesion();

    if($sesion->getLogin()){

      //Leemos los datos de la tabla
      $data = $this->modelo->getUsuarios();

  		$datos = [
  			"titulo" => "Administrativo Usuarios",
  			"menu" => false,
  			"admin" => true,
  			"data" => $data
  		];
  		$this->vista("adminUsuariosCaratulaVista",$datos);
          }else{
        header("location:".RUTA."admin");
      }
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
          header("location:".RUTA."adminUsuarios");

		}else{
      $datos = [
        "titulo" => "Error en el registro",
        "menu" => false,
        "errores" => [],
        "data" => [],
        "subtitulo" => "Error en la incercion del registro",
        "texto" => "Existió en la incercion del registro, 
        vuelva a intentarlo",
        "color" => "alert-danger",
        "url" => "adminInicio", //regresamos a login
        "colorBoton" => "btn-danger",
        "textoBoton" => "Regresar"
        ];
        $this->vista("mensajeVista",$datos);

		}
      } else {
        $datos = [
        "titulo" => "Administrativo Usuarios Alta",
        "menu" => false,
        "admin" => true,
        "errores" => $errores,
		"data" => $data
        
      ];
      $this->vista("adminUsuariosVista",$datos);
      }
    } else {
      $datos = [
        "titulo" => "Administrativo Usuarios Alta",
        "menu" => false,
        "admin" => true,
        "data" => []
      ];
      $this->vista("adminUsuariosVista",$datos);
    }
	
  }
    //eliminar
	public function baja($idAdmin)
	{//Definiendo los arreglos
    $errores = array();
    $data = array();

    // Recibiendo datos de la vista
		if ($_SERVER['REQUEST_METHOD']=="POST") {

    }
    $data = $this->modelo->getUsuarioId($idAdmin);
    $llaves = $this->modelo->getLlaves("adminStatus");
    // Abrir la vista
    $datos = [
      "titulo" => "Administrativo Usuarios Eliminar",
      "menu" => false,
      "admin" => true,
      "status" => $llaves,
      "errores" => $errores,
      "data" => $data
    ];
    
  $this->vista("adminUsuariosBorraVista",$datos);
	}
    //actualizar
	public function cambio($idAdmin="")
	{
    //Definiendo los arreglos
    $errores = array();
    $data = array();

    // Recibiendo datos de la vista
		if ($_SERVER['REQUEST_METHOD']=="POST") {
      
      $idAdmin = isset($_POST['idAdmin'])?$_POST['idAdmin']:"";
      $correo = isset($_POST['correo'])?$_POST['correo']:"";
      $clave1 = isset($_POST['clave1'])?$_POST['clave1']:"";
      $clave2 = isset($_POST['clave2'])?$_POST['clave2']:"";
      $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
      $status = isset($_POST['status'])?$_POST['status']:"";
      //Validacion
      if(empty($correo)){
        array_push($errores,"El correo del usuario es requerido.");
      }
      if(empty($nombre)){
        array_push($errores,"El nombre del usuario es requerido.");
      }
      if($status=="void"){
        array_push($errores,"Selecciona el estado del usuario.");
      }
      if(!empty($clave1) && !empty($clave2)){
        if($clave1 != $clave2){
          array_push($errores,"Los valores no coinciden.");
        }
      }
      
      if(empty($errores)){
     
        // Arreglo de datos
        $data = [
        "idAdmin" => $idAdmin,
        "nombre" => $nombre,
        "clave1" => $clave1,
        "clave2" => $clave2,
        "status" => $status,
        "correo" => $correo
        ];
       // Mandamos al modelo
        $errores = $this->modelo->modificaUsuario($data);

        //Validacion de la modificacion de datos
        
        if(empty($errores)){
          header("location:".RUTA."adminUsuarios");
          
        }
           
      }
    }
      $data = $this->modelo->getUsuarioId($idAdmin);
      $llaves = $this->modelo->getLlaves("adminStatus");
      $datos = [
        "titulo" => "Administrativo Usuarios Modifica",
        "menu" => false,
        "admin" => true,
        "status" => $llaves,
        "errores" => $errores,
        "data" => $data
      ];
      $this->vista("adminUsuariosModificaVista",$datos);
    
	}
}


?>