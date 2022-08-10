<?php
/*
Controlador Carrito
 */
class Carrito extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("CarritoModelo");     
    }

    function caratula($errores=[]){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {
    		
            //Recuperamos el id del usuario
            $usuario_id = $_SESSION["usuario"]["idUsuarios"];

            //Leer los productos del carrito

            $data = $this->modelo->getCarrito($usuario_id);

    		$datos = [
                "titulo" => "Bienvenido a Zona-Games",
                "data" => $data,
                "usuario_id" => $usuario_id,
                "errores" => $errores,
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

    $this->caratula($errores);
    }

    public function actualiza()
       {
           if (isset($_POST["num"]) && isset($_POST["usuario_id"])) {
               $errores = array();
               $num = $_POST["num"];
               $usuario_id = $_POST["usuario_id"];
               for ($i=0; $i < $num ; $i++) { 
                   $producto_id = $_POST["i".$i];
                   $cantidad = $_POST["c".$i];
                   if (!$this->modelo->actualiza($usuario_id, $producto_id, $cantidad)) {
                       array_push($errores, "Error al actualizar el producoto ".$producto_id);
                   }
               }
               $this->caratula($errores);
           }
       }   

    public function borrar($producto_id, $usuario_id)
    {
        $errores = array();
        if (!$this->modelo->borrar($producto_id, $usuario_id)) {
            array_push($errores, "Error en el registro del carrito");
        }
        $this->caratula($errores);
    }  

    public function checkout()
    {
        $sesion = new Sesion();
        if(!$sesion->getLogin()){

        }else{
            $datos = [
                "titulo" => "Carrito | checkout",
                "menu" => true
            ];
            $this->vista("checkoutVista", $datos);
        }
    }
}

?>