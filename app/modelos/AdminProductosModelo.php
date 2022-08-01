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
    $sql = "SELECT * FROM llaves WHERE tipo='".$tipo. "'ORDER BY indice DESC"; 
   
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getProductoId($idProducto){
    $sql = "SELECT * FROM productos WHERE idProducto=".$idProducto;
    $data = $this->db->query($sql);
    return $data;
  }

  public function bajaLogica($idProducto){
    $errores = array();
    $sql = "UPDATE productos SET baja=1 WHERE idProducto=".$idProducto;
    if(!$this->db->queryNoSelect($sql)){
      array_push($errores,"Error al modificar el registro para baja.");
    }
    return $errores;
  }

  public function modificaProducto($data){
    $errores = array();
    $salida = false;
    //print_r($data);
    if (!empty($data["idProducto"])) {
       $sql = "UPDATE productos SET "; //1. id
       $sql.= "tipo='".$data['tipo']."', ";           //2. tipo
       $sql.= "nombre='".$data['nombre']."', ";          //3. nombre
       $sql.= "descripcion='".$data['descripcion']."', ";     //4. descripcion
       $sql.= "precio=".$data['precio'].", ";               //5. precio
       $sql.= "descuento=".$data['descuento'].", ";            //6. descuento 
       $sql.= "imagen='".$data['imagen']."', ";          //8. imagen
       $sql.= "fecha_lanzamiento='".$data['fecha_lanzamiento']."', ";           //9. fecha
       $sql.= "nuevos='".$data['nuevos']."', ";           //14. nuevos
       $sql.= "status='".$data['status']."', ";          //15. status
       $sql.= "baja=0, ";                              //16. baja
       $sql.= "desarrolladora='".$data['desarrolladora']."', ";           //20. autor
       $sql.= "editor='".$data['editor']."' ";       //21. editor
       $sql.= "WHERE idProducto=".$data['idProducto'];
       //Enviamos a la BD
       //$salida = $this->db->queryNoSelect($sql);
       print $sql;
    }
    
   // echo "estoy en modificar producto";
    return $salida;

    
  }

  public function altaProducto($data){
    $sql = "INSERT INTO productos VALUES(0,"; //1. idProducto
    $sql.= "'".$data['tipo']."', ";           //2. tipo
   $sql.= "'".$data['nombre']."', ";          //3. nombre
   $sql.= "'".$data['descripcion']."', ";     //4. descripcion
   $sql.= $data['precio'].", ";               //5. precio
   $sql.= $data['descuento'].", ";            //6. descuento 
   
   $sql.= "'".$data['imagen']."', ";          //8. imagen
   $sql.= "'".$data['fecha_lanzamiento']."', ";           //9. fecha
  
   
   $sql.= "'".$data['nuevos']."', ";           //14. nuevos
   $sql.= "'".$data['status']."', ";          //15. status
   $sql.= "0, ";                              //
   
   $sql.= "'".$data['desarrolladora']."', ";           //
   $sql.= "'".$data['editor']."')";       //
  
   print $sql;
   
   return $this->db->queryNoSelect($sql);
  }
  public function getNuevos()
  {
    $sql = "SELECT * FROM productos WHERE nuevos=0 AND baja=0 LIMIT 2 ";
    $data = $this->db->querySelect($sql);
    return $data;
  }
}

?>