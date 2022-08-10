<?php
/**
* Manejar sesión
*/
class Sesion{
	private $login = false;
	private $usuario;

	function __construct()
	{
		session_start();
		if (isset($_SESSION["usuario"])) {
			$this->usuario = $_SESSION["usuario"];
			$this->login = true;

			//Calculo del total del carrito

			$usuario_id = $_SESSION["usuario"]["idUsuarios"];
			$_SESSION["carrito"] = $this->totalCarrito($usuario_id);
			//var_dump($_SESSION["carrito"]);

		} else {
			unset($this->usuario);
			$this->login = false;
		}
	}

	public function iniciarLogin($usuario){
		if ($usuario) {
			$this->usuario = $_SESSION["usuario"] = $usuario;
			$this->login = false;
		}
	}

	public function finalizarLogin(){
		unset($_SESSION["usuario"]);
		unset($this->usuario);
		session_destroy();
		$this->login = false;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function totalCarrito($usuario_id)
	{
		$db = new MySQLdb();
		$sql = "SELECT SUM(p.precio * c.cantidad) - SUM(c.descuento) as tot ";
		$sql.= "FROM carrito as c, productos as p ";
		$sql.= "WHERE c.usuario_id = ".$usuario_id." AND ";
		$sql.= "c.producto_id=p.idProducto AND c.estado=0";
		$data = $db->query($sql);
		$tot = $data["tot"]?$data['tot']:"";
		$db->cerrar();
		return $tot;
	}
}

?>