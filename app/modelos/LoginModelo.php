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
    function validaCorreo($email){
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $data = $this ->db->query($sql);
        return (count($data)==0)? true:false;
    }
}
?>