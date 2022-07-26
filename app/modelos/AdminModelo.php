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
}

?>