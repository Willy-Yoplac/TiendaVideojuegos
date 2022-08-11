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

    public function getCarrito($usuario_id)
    {
    	$sql = "SELECT c.usuario_id as usuario, ";
    	$sql.= "c.producto_id as producto, ";
    	$sql.= "c.cantidad as cantidad, ";
    	$sql.= "c.producto_id as producto, ";
    	$sql.= "c.descuento as descuento, ";
    	$sql.= "p.precio as precio, ";
    	$sql.= "p.imagen as imagen, ";
    	$sql.= "p.descripcion as descripcion, ";
    	$sql.= "p.nombre as nombre ";
    	$sql.= "FROM carrito as c, productos as p ";
    	$sql.= "WHERE usuario_id='".$usuario_id."' AND ";
    	$sql.= "estado=0 AND ";
    	$sql.= "c.producto_id=p.idProducto";

    	return $this->db->querySelect($sql);
    }

    public function actualiza($usuario_id, $producto_id, $cantidad)
    {
    	$sql = "UPDATE carrito ";
    	$sql.= "SET cantidad=".$cantidad." ";
    	$sql.= "WHERE usuario_id=".$usuario_id." AND ";
    	$sql.= "producto_id=".$producto_id;
    	return $this->db->queryNoSelect($sql);
    }


    public function borrar($producto_id, $usuario_id)
    {
    	$sql = "DELETE FROM carrito WHERE usuario_id=".$usuario_id." AND ";
    	$sql.= "producto_id=".$producto_id;
    	return $this->db->queryNoSelect($sql);
    }

    public function cierraCarrito($usuario_id, $estado)
    {
        $sql = "UPDATE carrito ";
        $sql.= "SET estado=".$estado.", ";
		$sql.= "fecha=(NOW()) ";
        $sql.= "WHERE usuario_id=".$usuario_id." AND ";
        $sql.= "estado=0";
        return $this->db->queryNoSelect($sql);
    }

	public function ventas()
	{
		$sql = "SELECT SUM(p.precio*c.cantidad) as costo, ";
		$sql.= "SUM(c.descuento) as descuento, ";
		$sql.= "c.fecha as fecha, c.usuario_id as usuario_id ";
		$sql.= "FROM carrito as c, productos as p ";
		$sql.= "WHERE c.producto_id=p.idProducto AND ";
		$sql.= "c.estado=1 ";
		$sql.= "GROUP BY DATE(c.fecha), c.usuario_id";
		//print $sql;
		return $this->db->querySelect($sql);
	}
 

}
?>