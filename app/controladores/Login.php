<?php
/*
Controlador Login
 */
class Login extends Controlador {
    private $modelo;
    function __construct(){
        $this->modelo = $this->modelo("LoginModelo");     
    }

    function caratula(){
        $datos = ["titulo" => "Login", "menu" =>false];
        $this->vista("loginVista", $datos);     
    }

    function olvido(){
        print "Hola desde el olvido";
    }

    function registro(){
        $datos = ["titulo" => "Registro usuario", "menu" =>false];
        $this->vista("loginRegistroVista", $datos);
    }
    
}

?>