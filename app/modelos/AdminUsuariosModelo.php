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
}
?>