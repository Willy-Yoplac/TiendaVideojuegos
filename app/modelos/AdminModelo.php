<?php
/**
 * Administrador Modelo
 */
class AdminModelo{
	private $db;
	
	function __construct()
	{
		$this->db = new MySQLdb();
	}

	public function verificarClave($data)
	{
		//Declarramos el arreglo
		$errores = array();

		//Encriptar
		$clave = hash_hmac("sha512", $data["clave"], LLAVE);

		//Enviamos el query
		$sql = "SELECT idAdmin, clave,status FROM administrativos 
		WHERE correo='".$data['usuario']."'";
        $data = $this ->db->query($sql);
		

		//Validacion
		if(empty($data)){
			array_push($errores, "No existe el usuario");
		}else if($clave != $data['clave']){
			array_push($errores, "La clave de acceso no es correcta");
		}
		else if( $data['status']==0){
			array_push($errores, "El usuarios esta desactivado");
		}
		else if(count($data)>3){
			array_push($errores, "El correo electronico esta duplicado");
		}else{
			//para probar
			echo "Todo estubo bien";
			if(!$this->db->queryNoSelect($sql)){
				array_push($errores, "Algo esta fallando");

			}

		}
		//Regresamos los errores
		return $errores;
	}
}

?>