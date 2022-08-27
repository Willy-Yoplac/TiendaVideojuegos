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
        if($sesion->getLogin()){
            //
            $data = $_SESSION["usuario"];
            //
            $datos = [
                
                "titulo" => "Carrito | Datos de envio",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("datosEnvioVista", $datos);

        }else{
            $datos = [
                "titulo" => "Carrito | checkout",
                "menu" => true
            ];
            $this->vista("checkoutVista", $datos);
        }
    }

    public function formaPago($value="")
    {
        $datos = [
            "titulo" => "Carrito | Forma de Pago",
            "menu" => true
        ];
        $this->vista("formaPagoVista", $datos);
    }

    public function verificar()
    {
        $sesion = new Sesion();
            
        //Recuperamos el id del usuario
        $usuario_id = $_SESSION["usuario"]["idUsuarios"];

        //Leer los productos del carrito

        $carrito = $this->modelo->getCarrito($usuario_id);

        $pago = $_POST["pago"]?$_POST['pago']:"";
        $data = $_SESSION["usuario"];
        $datos = [
            "titulo" => "Carrito | Verificar datos",
            "pago" => $pago,
            "data" => $data,
            "carrito" => $carrito,
            "menu" => true
        ];
        
        //var_dump($pago); //medio de pago

        $nombre=$data["nombre"]." ".$data["apellidoPaterno"];
    
       // print "<br>";
         var_dump($nombre);
        // print "<br>";
        // var_dump($apellido);
        $email=$data["email"];
        $this->modelo->enviarCorreo($email,$nombre);
        $this->vista("verificaVista", $datos);
    }

    public function gracias()
    {
        $sesion = new Sesion();
        $data = $_SESSION["usuario"];
        $usuario_id = $_SESSION["usuario"]["idUsuarios"];

       if($carrito = $this->modelo->cierraCarrito($usuario_id,1)){
            $datos = [
            "titulo" => "Carrito | Gracias por su compra",
            "data" => $data,
            "menu" => true
            ];
        $this->vista("graciasVista", $datos);
       } else {
            $datos = [
                "titulo" => "Error en la actualización del carrito",
                "menu" => true,
                "errores" => [],
                "data" => [],
                "subtitulo" => "Error en la actualización del carrito",
                "texto" => "Existió un un problema al actualizar el estado del carrito. Prueba más tarde o comuníquese a nuestro servicio de soporte técnico.",
                "color" => "alert-danger",
                "url" => "tienda", //regresamos a tienda
                "colorBoton" => "btn-danger",
                "textoBoton" => "Regresar"
                ];
            $this->vista("mensajeVista",$datos);
       }
    }
    public function ventas()
    {
        $data = $this->modelo->ventas();
        $datos=[
            "titulo" => "Ventas",
            "data" => $data,
            "menu" => true
          ];
          $this->vista("adminVentasVista",$datos);
    }
}

?>