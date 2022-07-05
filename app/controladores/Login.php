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
        $errores = array();
        $data = array(); //para capturar solo el dato erroneo

        if ($_SERVER['REQUEST_METHOD']=="POST"){
            $nombres = isset($_POST['nombre']) ? $_POST['nombre']:"";
            //si E en post -nombre regresamos NOMBRE si no una cad vacia
            $apellido_paterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno']:"";
            $apellido_materno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno']:"";
            $correo = isset($_POST['correo']) ? $_POST['correo']:"";
            $clave1 = isset($_POST['clave1']) ? $_POST['clave1']:"";
            $clave2 = isset($_POST['clave2']) ? $_POST['clave2']:"";
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:"";
            $pais = isset($_POST['pais']) ? $_POST['pais']:"";
            $data = [
                "nombre" => $nombres,
                "apellidoPaterno" => $apellido_paterno,
                "apellidoMaterno" => $apellido_materno,
                "correo" => $correo,
                "clave1" => $clave1,
                "clave2" => $clave2,
                "ciudad" => $ciudad,
                "pais" => $pais
            ];

            //validadcion
            if($nombres==""){
                array_push($errores, "El nombre es requerido");
            }
            if ($apellido_paterno==""){
                array_push($errores, "El apellido paterno es requerido");
            }
            if ($correo==""){
                array_push($errores, "El correo es requerido");
            }
            if ($clave1==""){
                array_push($errores, "La clave de acceso es requerida");
            }
            if ($clave2==""){
                array_push($errores, "La clave de verificacion de acceso es requerida");
            }
            if ($ciudad==""){
                array_push($errores, "La ciudad es requerida");
            }
            if ($pais==""){
                array_push($errores, "El país es requerida");
            }
            if ($clave1!=$clave2){
                array_push($errores, "Las claves de acceso no coinsiden");
            }
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                array_push($errores, "El correo electronico no es valido");
            }
            if (count($errores)==0){
                print "Dar de alta los errores en el modelo";

            }else{
                
                $datos = ["titulo" => "Registro usuario", 
                "menu" =>false,
                 "errores"=>$errores,
                "data" => $data];
                $this->vista("loginRegistroVista", $datos);
            }

        }else{

            $datos = ["titulo" => "Registro usuario", "menu" =>false];
            $this->vista("loginRegistroVista", $datos);
        }
    }
    
}

?>