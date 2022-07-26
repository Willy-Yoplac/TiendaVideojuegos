<?php
//Control maneja la URL y lanza los procesos
/* 1 elemento es el objeto o controlador
2 " metodo o accion
3 y posteriores son los parametros
 */
class Control{
    protected $controlador = "Login";
    //solo puede ver la clase o las heredadas
    protected $metodo = "caratula";
    protected $parametros = []; 

    //__metodos magicos
    function __construct(){
       $url = $this->separarURL();

       if($url != "" && file_exists("../app/controladores/".ucwords($url[0]).".php")){
        $this->controlador =ucwords($url[0]);
        unset($url[0]);       
       }
       //Cargando la clase controlador
       require_once("../app/controladores/".ucwords($this->controlador).".php");
      //Instanciamo la clase del controlador
       $this->controlador = new $this->controlador;
       
       if(isset($url[1])){
        if(method_exists($this->controlador, $url[1])){
            $this->metodo = $url[1];
            unset($url[1]);
        }
       }
       //si E arreglo, lo tomamos y si no tomamos uno vacio
       $this->parametros = $url ? array_values($url):[];

       call_user_func_array([$this->controlador, $this->metodo],
       $this->parametros);
           }

    function separarURL(){
        $url = "";
        if(isset($_GET["url"])){
            //eliminamos caracter final
            $url = rtrim($_GET["url"],"/");
            $url = rtrim($_GET["url"],"\\");
            //limpiamos caracter no propios de la URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //separamos
            $url = explode( "/", $url); //vector

        }
        return $url;

    }
} 


?>