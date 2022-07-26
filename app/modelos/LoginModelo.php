<?php
/*Login Modelo
 */
class LoginModelo{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }
    function insertarRegistro($data){
        $r = false;
        if ($this->validaCorreo($data["email"])) {
            //envriptacion de las contraseñas
            $clave = hash_hmac("sha512", $data["clave1"], "mimamamemima");
            $sql = "INSERT INTO usuarios VALUES (0,";
            $sql.="'".$data["nombre"]."', ";
            $sql.="'".$data["apellidoPaterno"]."', ";
            $sql.="'".$data["apellidoMaterno"]."', ";
            $sql.="'".$data["email"]."', ";
            $sql.="'".$clave."', ";
            $sql.="'".$data["ciudad"]."', ";
            $sql.="'".$data["pais"]."')";
            $r= $this->db->queryNoSelect($sql);

        }
        return $r; 
    }

    function cambiarClaveAcceso($id, $clave){
        $r = false;
        $clave = hash_hmac("sha512", $clave, "mimamamemima");
        $sql = "UPDATE usuarios SET ";
        $sql.= "clave='".$clave."' ";
        $sql.= "WHERE idUsuarios=".$id;
        $r = $this->db->queryNoSelect($sql);
        return $r; 
    }

    function validaCorreo($email){
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $data = $this ->db->query($sql);
        return (count($data)==0)? true:false;
        // 0 -> no existe el correo, si no si existe el correo
    }

    function verificar($usuario, $clave){
        $errores = array();
        $sql = "SELECT * FROM usuarios WHERE email='".$usuario."'";
        $clave = hash_hmac("sha512", $clave, "mimamamemima");
        $clave = substr($clave,0,200);
        //consulta
        $data = $this ->db->query($sql);
        //validación
        if (empty($data)) {
            array_push($errores, "No existe este usuario, favor de verificarlo.");
        } else if($clave!=$data["clave"]) {
            array_push($errores, "Clave de acceso erronea, favor de verificar.");
        }
        return $errores;
    }

    function getUsuarioCorreo($email){
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $data = $this->db->query($sql);
        return $data;
      }

    function enviarCorreo($email){
        $data = $this->getUsuarioCorreo($email);
        $id = $data["idUsuarios"];
        $nombre = $data["nombre"]." ".$data["apellidoPaterno"]." ".$data["apellidoMaterno"];
        $msg = $nombre.", entra a la siguiente liga para cambiar tu clave de acceso a la tienda 
        Zona Games ''<br>";
        $msg.= "<a href='".RUTA."/login/cambiaclave/".$id."'>Cambia tu clave de acceso</a>";

        $headers = "MIME-Version: 1.0\r\n";
        //r retorno de carro y n nueva linea  
        $headers .= "Content-type:text/html; charset=UTF-8\r\n"; 
        $headers .= "From: Zona-Games\r\n"; 
        $headers .= "Repaly-to: willy.yoplac@unmsm.edu.pe\r\n";

        $asunto = "Cambiar clave de acceso";

        return (@mail($email,$asunto, $msg, $headers));
    }
}
?>