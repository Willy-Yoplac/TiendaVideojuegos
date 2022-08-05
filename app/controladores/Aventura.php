<?php
/*
Controlador Aventura
 */
class Aventura extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("AventuraModelo");     
    }

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {
    		//
            //Leer los productos nuevos
            $data = $this->getAventura();


    		$datos = [
                "titulo" => "Juegos de Aventura",
                "activo" => "aventura",
                "data" => $data,
                "menu" =>true
            ];
        $this->vista("aventuraVista", $datos);  
    	} else {
    		header("location:".RUTA);
    	}
    	
         
    }

    public function getAventura(){
        $data = array();
        $data = $this->modelo->getAventura();
        return $data;
    }
}

?>