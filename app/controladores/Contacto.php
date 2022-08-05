<?php
/*
Controlador Contacto
 */
class Contacto extends Controlador {
    private $modelo;
    function __construct(){}

    function caratula(){
    	$sesion = new Sesion();
    	if ($sesion->getLogin()) {

    		$datos = [
                "titulo" => "Contacto",
                "activo" => "contacto",
                "menu" => true
            ];
        $this->vista("contactoVista", $datos);  
    	} else {
    		header("location:".RUTA);
    	}  
    }

    public function enviar(){
        $errores = array();
        $data = array();
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            //Recuperar la informacion
            $correo = isset($_POST['correo']) ? $_POST['correo']:"";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']:"";
            $observacion = isset($_POST['observacion']) ? $_POST['observacion']:"";
            if ($correo==""){
                array_push($errores, "El correo es requerido");
            }
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                array_push($errores, "<br>"."El correo electronico no es valido");
            }
            if ($nombre==""){
                array_push($errores, "<br>"."Su nombre es requerido");
            }
            if ($observacion==""){
                array_push($errores, "<br>"."Su observacion es requerida");
            }
            if(count($errores)==0){
                //Mail del administrador
                $email = "info@mitienda.com";
                //Enviar Correo
                //
                $msg = $nombre." Ha enviado una observación<br>";
                $msg.= $correo."<br>";
                $msg.= $observacion;

                $headers = "MIME-Version: 1.0\r\n";  
                $headers .= "Content-type:text/html; charset=UTF-8\r\n"; 
                $headers .= "From: ".$nombre."\r\n"; 
                $headers .= "Replay-to: ".$correo."\r\n";

                $asunto = "Observación";

                    if(@mail($email, $asunto, $msg, $headers)){//si regresa True
                        $datos = [
                            "titulo" => "Envío de observación",
                            "menu" => true,
                            "errores" => [],
                            "data" => [],
                            "subtitulo" => "Gracias por su correo",
                            "texto" => "En breve nos comunicaremos con usted...",
                            "color" => "alert-success",
                            "url" => "tienda",
                            "colorBoton" => "btn-success",
                            "textoBoton" => "Regresar"
                            ];
                            $this->vista("mensajeVista",$datos);

                    }else{
                        $datos = [
                            "titulo" => "Error en el envio del Correo",
                            "menu" => true,
                            "errores" => [],
                            "data" => [],
                            "subtitulo" => "Error en el envio del Correo",
                            "texto" => "Existió un un problema al enviar el correo electronico",
                            "color" => "alert-danger",
                            "url" => "tienda", 
                            "colorBoton" => "btn-danger",
                            "textoBoton" => "Regresar"
                            ];
                            $this->vista("mensajeVista",$datos);
                        }
                    } else if(count($errores)){ // 0 no entre, != -> entra
                        $datos = [
                        "titulo" => "Contacto", 
                        "menu" => true,
                        "errores"=> $errores,
                        "subtitulo" => "Envio de correo", 
                        "data" => []
                        ];
                            $this->vista("contactoVista", $datos);
                    } 
            }          
        
    }

}
?>