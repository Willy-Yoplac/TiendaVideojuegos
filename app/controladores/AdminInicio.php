<?php
/*
Controlador Login
 */
class AdminInicio extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("AdminInicioModelo");     
    }

    function caratula(){
        //Creamos sesion
        $sesion = new Sesion();

        if($sesion->getLogin()){
           $datos = ["titulo" => "Administrativo | Inicio",
            "menu"=>false,
            "admin" =>true,
            "data" => []
        ];
        $this->vista("AdminInicioVista", $datos); 
        }else{
            header("location:".RUTA."admin");
        }
    }
}

?> 