<?php
/*
Controlador Sobre Nosotros
 */
class SobreNosotros extends Controlador {
    private $modelo;
    function __construct(){}

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {

    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "activo" => "sobrenosotros",
                "menu" =>true
            ];
        $this->vista("sobrenosotrosVista", $datos);  
    	} else {
    		header("location:".RUTA);
    	}
    	
         
    }
}

?>