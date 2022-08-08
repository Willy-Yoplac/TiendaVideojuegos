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
<<<<<<< HEAD
    		//
            //Leer los productos nuevos
           // $data = $this->getNuevos();

            //$nuevos = $this->getNuevos1();

=======
    		
            //Leer los productos que NO son nuevos
            //$data = $this->getNuevos();
            //Leer los productos que SI son nuevos
            //$nuevos = $this->getNuevos1();


>>>>>>> 2doAvance
    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "data" => $data,
                "nuevos" => $nuevos,
<<<<<<< HEAD
                //"activo" => "aventura",
=======
>>>>>>> 2doAvance
                "menu" =>true
            ];
        $this->vista("tiendaVista", $datos);  
    	} else {
    		header("location:".RUTA);
<<<<<<< HEAD
    	}
    	
         
    }

    public function agregaProducto($idProducto, $idUsuario)
    {
        print $idProducto.",".$idUsuario; 
    }

    
=======
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
>>>>>>> 2doAvance
}

?>