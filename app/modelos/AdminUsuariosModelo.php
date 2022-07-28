<?php
/**
 * Modelo usuarios Admin
 */
class AdminUsuariosModelo{
	private $db;
	
	function __construct()
	{
		$this->db = new MySQLdb();
	}
	public function insertarDatos($data)
	{ 
		$clave = hash_hmac("sha512", $data["clave1"], LLAVE);
		$sql = "INSERT INTO administrativos VALUES(0,";
		$sql.="'".$data["nombre"]."', ";
		$sql.="'".$data["usuario"]."', ";
		$sql.="'".$clave."', ";
		$sql.="1, ";
		$sql.="(NOW())) ";
		return $this->db->queryNoSelect($sql);
	}

	public function getUsuarios(){
		$sql = "SELECT * FROM administrativos WHERE status=1";
		$data = $this->db->querySelect($sql);
		return $data;
	}

	public function getLlaves($tipo){
		$sql = "SELECT * FROM llaves WHERE tipo='".$tipo."'ORDER BY indice DESC";
		$data = $this->db->querySelect($sql);
		return $data;
		
	}

	public function getUsuarioId($idAdmin){
		$sql = "SELECT * FROM administrativos WHERE idAdmin=".$idAdmin;
		$data = $this->db->query($sql);
		return $data;
	}

	public function modificaUsuario($data){
		$errores = array();
		$sql = "UPDATE administrativos SET ";
		$sql.= "correo='".$data["correo"]."', ";
		$sql.= "nombre='".$data["nombre"]."', ";
		$sql.= "status=".$data["status"];
		if(!empty($data['clave1'] && !empty($data['clave2']))){
			$clave = hash_hmac("sha512", $data["clave1"], LLAVE);
			$sql.= ", clave='".$clave."'";
		}
		$sql.= " WHERE idAdmin=".$data["idAdmin"];
		if(!$this->db->queryNoSelect($sql)){
			array_push($errores, "Existio un error al actualizar el registro");
		}
		//print $sql;
		return $errores;
	}
}
?>