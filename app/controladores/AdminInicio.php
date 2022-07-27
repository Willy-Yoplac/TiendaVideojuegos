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
    	
    	$datos = ["titulo" => "Administrativo ^ Inicio",
		"menu"=>false,
		"admin" =>true,
		"data" => []
	];
        $this->vista("AdminInicioVista", $datos);   	   	
         
    }
}

?> 