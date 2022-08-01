<?php
/*
Controlador Login
 */
class Tienda extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("TiendaModelo");     
    }

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {
    		//
            //Leer los productos nuevos
            $data = $this->getNuevos();

    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "data" => $data,
                "activo" => "aventura",
                "menu" =>true
            ];
        $this->vista("tiendaVista", $datos);  
    	} else {
    		header("location:".RUTA);
    	}
    	
         
    }

    function logout(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $sesion = new Sesion();
            $sesion-> finalizarLogin();
        }
        header("location:".RUTA);
    }

    public function getNuevos(){
        $data = array();
        require_once "AdminProductos.php";
        $productos = new AdminProductos();
        $data = $productos->getNuevos();
        unset($productos); //opcional
        return $data;
    }
}

?>