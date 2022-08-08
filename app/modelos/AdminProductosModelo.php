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
    $sql = "SELECT * FROM llaves WHERE tipo='".$tipo. "'"; 
   
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
 
    if (!empty($data["idProducto"])) {
       $sql = "UPDATE productos SET "; 
       $sql.= "tipo='".$data['tipo']."', ";           
       $sql.= "nombre='".$data['nombre']."', ";          
       $sql.= "descripcion='".$data['descripcion']."', ";     
       $sql.= "precio=".$data['precio'].", ";               
       $sql.= "descuento=".$data['descuento'].", ";             
       $sql.= "imagen='".$data['imagen']."', ";          
       $sql.= "fecha_lanzamiento='".$data['fecha_lanzamiento']."', ";           
       $sql.= "nuevos='".$data['nuevos']."', ";           
       $sql.= "status='".$data['status']."', ";          
       $sql.= "baja=0, ";                              
       $sql.= "desarrolladora='".$data['desarrolladora']."', ";           
       $sql.= "editor='".$data['editor']."' ";      
       $sql.= "WHERE idProducto=".$data['idProducto'];
       
       if(!$this->db->queryNoSelect($sql)){
        array_push($errores,"Existe un error, que aun no descubro de donde proviene.");
         
    }
    
  }     
    return $errores;
    
  }

  public function altaProducto($data){
    $sql = "INSERT INTO productos VALUES(0,"; 
    $sql.= "'".$data['tipo']."', ";          
   $sql.= "'".$data['nombre']."', ";          
   $sql.= "'".$data['descripcion']."', ";     
   $sql.= $data['precio'].", ";               
   $sql.= $data['descuento'].", ";           
   $sql.= "'".$data['imagen']."', ";          
   $sql.= "'".$data['fecha_lanzamiento']."', ";         
   $sql.= "'".$data['nuevos']."', ";           
   $sql.= "'".$data['status']."', ";          
   $sql.= "0, ";                            
   
   $sql.= "'".$data['desarrolladora']."', ";           //
   $sql.= "'".$data['editor']."')";       //
  
   print $sql;
   
   return $this->db->queryNoSelect($sql);
  }
  
  public function getNuevos()
  {
    $sql = "SELECT * FROM productos WHERE nuevos=0 AND baja=0 LIMIT 8 ";
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getNuevos1()
  {
    $sql = "SELECT * FROM productos WHERE nuevos='o' AND baja=0 LIMIT 8 ";
    $data = $this->db->querySelect($sql);
    return $data;
  }

}

?>