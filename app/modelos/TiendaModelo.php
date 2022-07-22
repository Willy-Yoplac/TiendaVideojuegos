<?php
/*Tienda Modelo
 */
class TiendaModelo{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }
}
?>