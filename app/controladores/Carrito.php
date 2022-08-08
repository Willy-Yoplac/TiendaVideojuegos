<?php
/*
Controlador Carrito
 */
class Carrito extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("CarritoModelo");     
    }

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {
    		
            //Leer los productos que NO son nuevos
            //$data = $this->getNuevos();
            //Leer los productos que SI son nuevos
            //$nuevos = $this->getNuevos1();


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

    public function agregaProducto($producto_id, $usuario_id)
    {
        $errores = array();
        if ($this->modelo->verificaProducto($producto_id, $usuario_id)==false){
            //Añadir el registro
            if ($this->modelo->agregaProducto($producto_id, $usuario_id)==false) {
                array_push($errores, "Error al insertar el producto al carrito");
            }
        }
    }

    //Caratula
    //this->caratula();    
}

?>