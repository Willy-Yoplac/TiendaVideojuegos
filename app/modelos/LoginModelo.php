<?php
/*Login Modelo
 */
class LoginModelo{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }
}
?>