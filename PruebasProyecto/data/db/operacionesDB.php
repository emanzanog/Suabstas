<?php
require_once('connector.php');
class OpDb{
	protected static function getDb(){
		$con= Connector::getInstance();
		$db = $con->getConnection();
		return $db;
	}
	private function __construct(){

	}


}

?>