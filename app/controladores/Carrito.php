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
    		
            //Recuperamos el id del usuario

            $usuario_id = $_SESSION["usuario"]["idUsuarios"]; //o usuarios
            //Leer los productos del carrito
            $data = $this->modelo->getCarrito($usuario_id);
            //var_dump($data);


    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "data" => $data,
                "usuario_id" => $usuario_id,
                "menu" =>true
            ];
        $this->vista("carritoVista", $datos);  
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
    //Caratula
    $this->caratula();
    }

        
}

?>