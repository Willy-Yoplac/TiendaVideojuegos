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
		$clave = hash_hmac("sha512", $data["clave1"], "mimamamemima");
		$sql = "INSERT INTO administrativos VALUES(0,";
		$sql.="'".$data["nombre"]."', ";
		$sql.="'".$data["usuario"]."', ";
		$sql.="'".$clave."', ";
		$sql.="1, ";
		$sql.="(NOW())) ";
		return $this->db->queryNoSelect($sql);
	}

	public function getUsuarios(){
		$sql = "SELECT * FROM administrativos WHERE estado=1";
		$data = $this->db->querySelect($sql);
		return $data;
	}

	public function getUsuarioId($idAdmin){
		$sql = "SELECT * FROM administrativos WHERE idAdmin=".$idAdmin;
		$data = $this->db->query($sql);
		return $data;
	}
}
?>