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

        //Leemos los status del Producto  
        $statusProducto = $this->modelo->getLlaves("statusProducto");

        //Recibimos la informacion de la vista
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            //Recibimos la informacion
            $idProducto = isset($_POST['idProducto'])?$_POST['idProducto']:"";
            $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
            $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
            $precio = isset($_POST['precio'])?$_POST['precio']:"";
            $descuento = isset($_POST['descuento'])?$_POST['descuento']:"0";
            $imagen = isset($_POST['imagen'])?$_POST['imagen']:"";
            $fecha_lanzamiento = isset($_POST['fecha_lanzamiento'])?$_POST['fecha_lanzamiento']:"";
            $nuevos = isset($_POST['nuevos'])?$_POST['nuevos']:"";
            $status = isset($_POST['status'])?$_POST['status']:"";
            $desarrolladora = isset($_POST['desarrolladora'])?$_POST['desarrolladora']:"";
            $editor = isset($_POST['editor'])?$_POST['editor']:"";
            
            //Validamos la informacion
            if(empty($nombre)){
                array_push($errores,"El nombre es requerido.");
              }
            if(empty($descripcion)){
                array_push($errores,"La descripcion es requerida.");
              }
            if(empty($desarrolladora)){
                array_push($errores,"La desarrolladora es requerida.");
              }

            if($precio < $descuento){
                array_push($errores,"El descuento no puede ser mayor al producto");
              }

              //Cambiar el nombre del archivo
              $imagen = $_POST['nombre'];
              $imagen = strtolower($imagen.".jpg");

              //Subir la imagen (archivo)
              if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                //Copiamos el archivo temporal
                copy($_FILES['imagen']['tmp_name'],"img/".$imagen);
              } else {
                array_push($errores, "Error al subir el archivo imagen.");
              }


            //Creacion del arreglo de datos
            $data = [ 
                "idProducto" => $idProducto,
                "tipo" => $tipo,
                "nombre" =>$nombre,
                "descripcion" =>$descripcion,
                "precio" => $precio,
                "descuento" => $descuento,
                "imagen" => $imagen,
                "fecha_lanzamiento" =>$fecha_lanzamiento,
                "nuevos" => $nuevos,
                "status" => $status,
                "desarrolladora" => $desarrolladora,
                "editor" => $editor   
                
            ];

            //Si no hay errores
            if (empty($errores)) {
        
              //Enviamos al modelo
              
              if($idProducto==""){
                // Si es vacio agrega
                if ($this->modelo->altaProducto($data)) {
                  header("location:".RUTA."adminProductos");
                }
              
               }
              
            }
        }

       //Vista añadir producto
      $datos = [
        "titulo" => "Administrativo Productos Añadir",
        "subtitulo" => "Modificar un Producto",
        "menu" => false,
        "admin" => true,
        "errores" => $errores,
        "tipoProducto" => $llaves,
        "statusProducto" => $statusProducto,
        "data" => $data
    ];
    var_dump($data);
    
    $this->vista("adminProductosAltaVista",$datos);
    }

    //ELIMINAR
    public function baja($idProducto=""){
        //Definir los arreglos
        $errores = array();
        $data = array();
       
       //Recibimos la informacion
        if ($_SERVER['REQUEST_METHOD']=="POST"){
          $idProducto = isset($_POST['idProducto'])?$_POST['idProducto']:"";

          if(!empty($idProducto)){
            $errores = $this->modelo->bajaLogica($idProducto);
            //Si no hay errores regresamos
            if(empty($errores)){
              header("location:".RUTA."adminProductos");
              
            }
          }
        }

        //Leemos los datos del idProducto
        $data = $this->modelo->getProductoId($idProducto);
         //Leemos las llaves de tipo producto  
         $llaves = $this->modelo->getLlaves("tipoProducto");
         //Leemos status del Producto  
        $statusProducto = $this->modelo->getLlaves("statusProducto");

        //Abrir la vista
        $datos = [
          "titulo" => "Administrativo Productos Eliminar",
         
          "menu" => false,
          "admin" => true,
          "tipoProducto" => $llaves,
          "statusProducto" => $statusProducto,
          "errores" => $errores,
          "data" => $data
      ];
      $this->vista("adminProductosBorraVista",$datos);
    }

    //ACTUALIZAR 
    public function cambio($idProducto="")
    {
        //Definir los arreglos
        $errores = array();
        $data = array();
       
       //Recibimos la informacion
        if ($_SERVER['REQUEST_METHOD']=="POST"){
          
          $idProducto = isset($_POST['idProducto'])?$_POST['idProducto']:"";
          $tipo = isset($_POST['tipo'])?$_POST['tipo']:"";
          $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
          $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
          $precio = isset($_POST['precio'])?$_POST['precio']:"";
          $descuento = isset($_POST['descuento'])?$_POST['descuento']:"0";
          $imagen = isset($_POST['imagen'])?$_POST['imagen']:"";
          $fecha_lanzamiento = isset($_POST['fecha_lanzamiento'])?$_POST['fecha_lanzamiento']:"";
          $nuevos = isset($_POST['nuevos'])?$_POST['nuevos']:"";
          $status = isset($_POST['status'])?$_POST['status']:"";
          $desarrolladora = isset($_POST['desarrolladora'])?$_POST['desarrolladora']:"";
          $editor = isset($_POST['editor'])?$_POST['editor']:"";
          
          //Validamos la informacion
          if(empty($nombre)){
            array_push($errores,"El nombre es requerido.");
          }
        if($status=="void"){
            array_push($errores,"Seleciona ele estatus del producto.");
          }

          if(empty($descripcion)){
              array_push($errores,"La descripcion es requerida.");
            }
          if(empty($desarrolladora)){
              array_push($errores,"La desarrolladora es requerida.");
            }

          if($precio < $descuento){
              array_push($errores,"El descuento no puede ser mayor al producto");
            }

            //Cambiar el nombre del archivo
            $imagen = $_POST['nombre'];
            $imagen = strtolower($imagen.".jpg");

            //Subir la imagen (archivo)
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
              //Copiamos el archivo temporal
              copy($_FILES['imagen']['tmp_name'],"img/".$imagen);
            } else {
              array_push($errores, "Error al subir el archivo imagen.");
            }

if(empty($errores)){}
          //Creacion del arreglo de datos
          $data = [ 
              "idProducto" => $idProducto,
              "tipo" => $tipo,
              "nombre" =>$nombre,
              "descripcion" =>$descripcion,
              "precio" => $precio,
              "descuento" => $descuento,
              "imagen" => $imagen,
              "fecha_lanzamiento" =>$fecha_lanzamiento,
              "nuevos" => $nuevos,
              "status" => $status,
              "desarrolladora" => $desarrolladora,
              "editor" => $editor         
          ];
         // Enviamos al modelo
          $errores = $this->modelo->modificaProducto($data);

          //validamos la modificacion
          if(empty($errores)){
            header("location:".RUTA."adminProductos");
            
          }
        
        }

        //Leemos los datos del idProducto
        $data = $this->modelo->getProductoId($idProducto);
         //Leemos las llaves de tipo producto  
         $llaves = $this->modelo->getLlaves("tipoProducto");
         //Leemos status del Producto  
        $statusProducto = $this->modelo->getLlaves("statusProducto");

        $datos = [
          "titulo" => "Administrativo Productos Modificar",
          "subtitulo" => "Modificar un Producto",
          "menu" => false,
          "admin" => true,
          "tipoProducto" => $llaves,
          "statusProducto" => $statusProducto,
          "errores" => $errores,
          "data" => $data
      ];
      
      $this->vista("adminProductosModificaVista",$datos);

        }

    public function getNuevos()
    {
      return $this->modelo->getNuevos();
    }


    public function producto($idProducto='',$regresa='')
    {
      //Leemos los datos del registro del IDProducto
      $data = $this->modelo->getProductoId($idProducto);
      //
      //Llamamos a la vista del producto
      //
      $datos = [
          "titulo" => "Productos",
          "subtitulo" => $data["nombre"],
          "menu" => true,
          "admin" => false,
          "regresa" => $regresa,
          "errores" => $errores,
          "data" => $data
      ];
      
      $this->vista("productoVista",$datos);
    }
}


?>