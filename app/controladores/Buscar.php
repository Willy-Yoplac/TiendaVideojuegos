<?php
/*
Controlador Buscar
 */
class Buscar extends Controlador {
    private $modelo;

    function __construct(){
        $this->modelo = $this->modelo("BuscarModelo");     
    }

    function caratula(){
    	
    }

    public function producto()
    {
       $buscar = isset($_POST['buscar'])?$_POST['buscar']:"";
       //$buscar = $_POST["buscar"]??"";
        if (!empty($buscar)) {
            
            $data = $this->modelo->getProductosBuscar($buscar);

            if(count($data)==0){
             $datos = [
                "titulo" => "No hay ningún artículo",
                "menu" => true,
                "errores" => [],
                "data" => [],
                "subtitulo" => "No hay artículos",
                "texto" => "No se encontró el producto '".$buscar."'.",
                "color" => "alert-danger",
                "url" => "tienda",
                "colorBoton" => "btn-danger",
                "textoBoton" => "Regresar"
             ];
             $this->vista("mensajeVista",$datos);
            } else {
                $datos = [
                "titulo" => "Resultado de la Búsqueda",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("buscarVista", $datos);  
             } 
        } else {
          header("location:".RUTA);
      }      
    }
}

?>