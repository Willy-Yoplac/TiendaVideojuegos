<?php
/**
 * Modelo Productos Admin.
 */
class AdminProductosModelo{
  private $db;
  
  function __construct()
  {
    $this->db = new MySQLdb();
  }

  public function insertarDatos($data){
  }

  public function getProductos(){
    $sql = "SELECT * FROM productos WHERE baja=0";
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getCatalogo(){
    $sql = "SELECT idProducto, nombre, tipo FROM productos ";
    $sql.= "WHERE baja=0 AND status=1 ";
    $sql.= "Order by tipo, nombre ";
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getLlaves($tipo){
    $sql = "SELECT * FROM llaves WHERE tipo='".$tipo."'"; //eliminé-> "'ORDER BY indice DESC"
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getProductoId($id){
    $sql = "SELECT * FROM productos WHERE id=".$id;
    $data = $this->db->query($sql);
    return $data;
  }

  public function bajaLogica($id){
    $errores = array();
    $sql = "UPDATE productos SET baja=1 WHERE id=".$id;
    if(!$this->db->queryNoSelect($sql)){
      array_push($errores,"Error al modificar el registro para baja.");
    }
    return $errores;
  }

  public function modificaProductos($data){
    $errores = array();
    return $errores;
  }

  public function altaProducto($data){
    $sql = "INSERT INTO productos VALUES(0,"; //1. id
    $sql.= "'".$data['tipo']."', ";           //2. tipo
   $sql.= "'".$data['nombre']."', ";          //3. nombre
   $sql.= "'".$data['descripcion']."', ";     //4. descripcion
   $sql.= $data['precio'].", ";               //5. precio
   $sql.= $data['descuento'].", ";            //6. descuento 
   
   $sql.= "'".$data['imagen']."', ";          //8. imagen
   $sql.= "'".$data['fecha_lanzamiento']."', ";           //9. fecha
  
   
   $sql.= "'".$data['nuevos']."', ";           //14. nuevos
   $sql.= "'".$data['status']."', ";          //15. status
   $sql.= "0, ";                              //16. baja
   
   $sql.= "'".$data['desarrolladora']."', ";           //20. autor
   $sql.= "'".$data['editor']."')";       //21. editorial
  
   print $sql;
   return $this->db->queryNoSelect($sql);
  }
}

?>