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
    public function alta()
    {
       //Vista Caratula
      $datos = [
        "titulo" => "Administrativo Productos Añadir",
        "menu" => false,
        "admin" => true,
        "data" => []
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