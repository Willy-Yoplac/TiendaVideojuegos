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
<<<<<<< HEAD
    		//
            //Leer los productos nuevos
           // $data = $this->getNuevos();

            //$nuevos = $this->getNuevos1();

=======
=======
>>>>>>> 2doAvance
    		
            //Leer los productos que NO son nuevos
            //$data = $this->getNuevos();
            //Leer los productos que SI son nuevos
            //$nuevos = $this->getNuevos1();


<<<<<<< HEAD
>>>>>>> 2doAvance
=======
>>>>>>> 2doAvance
    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "data" => $data,
                "nuevos" => $nuevos,
<<<<<<< HEAD
<<<<<<< HEAD
                //"activo" => "aventura",
=======
>>>>>>> 2doAvance
=======
>>>>>>> 2doAvance
                "menu" =>true
            ];
        $this->vista("tiendaVista", $datos);  
    	} else {
    		header("location:".RUTA);
<<<<<<< HEAD
<<<<<<< HEAD
    	}
    	
         
    }

    public function agregaProducto($idProducto, $idUsuario)
    {
        print $idProducto.",".$idUsuario; 
    }

    
=======
=======
>>>>>>> 2doAvance
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
<<<<<<< HEAD
>>>>>>> 2doAvance
=======
>>>>>>> 2doAvance
}

?>