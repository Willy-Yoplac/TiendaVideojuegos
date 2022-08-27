<?php
/*
Controlador Deportes
 */
class Deportes extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("DeportesModelo");     
    }

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {
    		//
            //Leer los productos nuevos
            $data = $this->getDeportes();


    		$datos = [
                "titulo" => "Juegos de Deportes",
                "activo" => "deportes",
                "data" => $data,
                "menu" =>true
            ];
        $this->vista("deportesVista", $datos);  
    	} else {
    		header("location:".RUTA);
    	}
    }

    public function getDeportes(){
        return $this->modelo->getDeportes();
    }
}

?>