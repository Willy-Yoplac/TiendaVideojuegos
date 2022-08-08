<?php
/*
Controlador Tienda
 */
class Tienda extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("TiendaModelo");     
    }

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {
    		
            //Leer los productos que NO son nuevos
            $data = $this->getNuevos();
            //Leer los productos que SI son nuevos
            $nuevos = $this->getNuevos1();


    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "data" => $data,
                "nuevos" => $nuevos,
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
        unset($productos);
        return $data;
    }

    public function getNuevos1(){
        $data = array();
        require_once "AdminProductos.php";
        $productos = new AdminProductos();
        $data = $productos->getNuevos1();
        unset($productos);
        return $data;
    }
}

?>