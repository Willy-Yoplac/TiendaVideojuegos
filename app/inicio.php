<?php
//carga las clases iniciales
define("RUTA","/TiendaVirtual/"); 
//paraque no duplique el llamado (vuelve a recargar la pagina)
require_once("libs/MySQLdb.php"); // horden
require_once("libs/Controlador.php");
// De carpeta libs tomamos Control.php
require_once("libs/Control.php");
require_once("libs/Sesion.php");
?>