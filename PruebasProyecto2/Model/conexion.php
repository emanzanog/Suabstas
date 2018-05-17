<?php
class Conexion{
	protected $con;
	private $_host = "localhost";
	private $_username = "dwes";
	private $_pass = "abc123.";
	private $_database = "subastas";
	protected static $instance;
	private function __construct(){
		$this->con = new mysqli($this->_host, $this->_username,$this->_pass, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conenct to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}

	private function __clone(){}

	public function getConnection() {
		return $this->con;
	}
	/**
		@return instance
	*/
	public static function getInstance() {
		if(!self::$instance) { // If no instance then make one
			self::$instance = new self();
		}
		return self::$instance;
	}
}
?>