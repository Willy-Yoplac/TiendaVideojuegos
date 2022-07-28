<?php
/*Admon Inicio Modelo
 */
class AdminInicioModelo{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }
}
?>