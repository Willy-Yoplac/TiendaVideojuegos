<?php
// Controlador para Productos
class AdminProductos extends Controlador{
    private $modelo;

    function __construct(){
        $this->modelo = $this->modelo("AdminProductosModelo");
 
    }
    public function caratula()
    {
        $sesion = new Sesion();
        if($sesion->getLogin()){

    //Leemos los datos de la tabla
      $data = $this->modelo->getProductos();

      //Leemos las llaves de tipo producto  
      $llaves = $this->modelo->getLlaves("tipoProducto");

      //Vista Caratula
      $datos = [
        "titulo" => "Administrativo Productos",
        "menu" => false,
        "admin" => true,
        "data" => $data,
        "tipoProducto" => $llaves
    ];
    $this->vista("adminProductosCaratulaVista",$datos);

        }else{
            header("location:".RUTA."admin");
        }
    }
    //REGISTRAR
    public function alta(){
       //Definir los arreglos
      $data = array();
      $errores = array();

        //Leemos las llaves de tipo producto  
      $llaves = $this->modelo->getLlaves("tipoProducto");

        //Leemos el estado del producto
      $statusProducto = $this->modelo->getLlaves("statusProducto");


       //Vista añadir producto
      $datos = [
        "titulo" => "Administrativo Productos Añadir",
        "menu" => false,
        "admin" => true,
        "errores" => $errores,
        "tipoProducto" => $llaves,
        "statusProducto" => $statusProducto,
        "data" => $data
    ];
    $this->vista("adminProductosAltaVista",$datos);
    }

    //ELIMINAR
    public function baja($idProducto="")
    {
        # code...
    }
    //ACTUALIZAR 
    public function cambio($idProducto="")
    {
        # code...
    }
}


?>