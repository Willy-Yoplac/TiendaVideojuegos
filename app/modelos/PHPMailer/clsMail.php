<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class clsMail{

    private $mail = null;
    
    function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls'; // != al del video
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 587;
        $this->mail->Username = "willy.yoplac@unmsm.edu.pe";
        $this->mail->Password = "kvfzlipmvasrfifc";
    }


    public function metEnviar( $titulo,  $nombre,  $correo,  $asunto,  $bodyHTML)
    {
        $this->mail->setFrom("willy.yoplac@unmsm.edu.pe", $titulo);
        //Corrreo que lo envia + titulo
        $this->mail->addAddress($correo,$nombre);
        //Direcion que recibe el correo
        
        
        $this->mail->Subject = $asunto;
        $this->mail->Body = $bodyHTML; //cuerpo del correo
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
        //Agregado
        //$this->mail->addAttachment('docs/Practica.rar' );
        //$this->mail->addAttachment($documento);
        //
        return $this->mail->send();
        //Agregago
        echo "Correo enviado";

    }
}

?>