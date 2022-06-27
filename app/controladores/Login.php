<?php
/*
Controlador Login
 */
class Login extends Controlador {
    function __construct(){
        print "Hello desde el controlador Login";
    }

    function caratula(){
        print "Hola desde la caratula"."<br>";
    }

    function metodoVariable(){
        if(func_num_args()>0){
            for ($i=0; $i < func_num_args() ; $i++) { 
                print func_get_arg($i)."<br>";
                # code...
            }
        }else{
            print "No hay argumentos"."<br>";
        }
    }
    function metodoFijos($arg1="uno", $arg2="dos", $arg3="tres"){
      print $arg1."<br>";
      print $arg2."<br>";
      print $arg3."<br>";
    }
    
}

?>