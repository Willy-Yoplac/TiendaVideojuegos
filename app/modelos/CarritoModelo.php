<?php
/*Carrito Modelo
 */
class CarritoModelo{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    public function verificaProducto($producto_id, $usuario_id)
    {
    	$sql = "SELECT * FROM carrito WHERE usuario_id=".$usuario_id." ";
    	$sql.= "AND producto_id=".$producto_id;
    	$r = $this->db->querySelect($sql);
    	return count($r);
    }

    public function agregaProducto($producto_id, $usuario_id)
    {
    	$sql = "SELECT * FROM productos WHERE idProducto=".$producto_id;
    	$data = $this->db->query($sql);

    	$sql = "INSERT INTO carrito ";
    	$sql.= "SET estado=0, "; //carrito abierto
    	$sql.= "producto_id=".$producto_id.", ";
    	$sql.= "usuario_id=".$usuario_id.", ";
    	$sql.= "descuento=".$data["descuento"].", ";
    	$sql.= "cantidad=1, ";
    	$sql.= "fecha=(NOW())";

    	return $this->db->queryNoSelect($sql);
    }
}
?>