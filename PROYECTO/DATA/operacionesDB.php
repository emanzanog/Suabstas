<?php
require_once('connector.php');
class OpDb{
	private static function getDb(){
		$con= Connector::getInstance();
		$db = $con->getConnection();
		return $db;
	}
	private function __construct(){

	}
	
	
	public static function insert($tabla, $objeto){
		
	}

	public static function selectUsuario($usr,$pass){
	 	$db = self::getDb();
		$sql = "SELECT * FROM Usuario WHERE NickName = '".$usr."' AND Password = '".$pass."'"; 
		$result = $db->query($sql);

		if(!$result){
			return "NUMERR[".$db->errno."], ERROR[".$db->error."]";
		}else{
			$row = $result->fetch_array();

			return $row;
		}
	}
	public function selectNickByCod($codUsuario){
		$db = self::getDb();
		$sql = "SELECT NickName FROM Usuario WHERE CodUsuario = ".$codUsuario; 
		$result = $db->query($sql);
		if($result){
			return $result->fetch_array()['NickName'];
		}
		return "ErrorNotFound";
	}
	public function selectCodUsr($nick){
		$db = self::getDb();
		$sql = "SELECT CodUsuario FROM Usuario WHERE NickName = '".$nick."'"; 
		$result = $db->query($sql);
		if($result){
			return $result->fetch_array()['CodUsuario'];
		}
		return "ErrorNotFound";
	}
	public function selectUsuarioCod ($codUsr){
		$db = self::getDb();
		$sql = "SELECT * FROM Usuario WHERE CodUsuario = ".$codUsr; 
		$result = $db->query($sql);
		$personas = null;
		if($result){

			while($row = $result->fetch_array()){
				$personas = new Persona($row);
			}
			return $personas;
		}
		return $personas;
	}


	public static function insertUsuario($p){
		$db = self::getDb();
		$sql = "INSERT INTO Usuario (Nombre,Apellidos,NickName,Email,Password) VALUES ('".$p->getNombre()."','".$p->getApellido()."','".$p->getUsuario()."','".$p->getMail()."','".$p->getPass()."')"; 
		$result = $db->query($sql);

		if(!$result){
			return "NUMERR[".$db->errno."], ERROR[".$db->error."]";
		}else{
			return true;
		}
	}
	public static function getMsgNuevos($codUsuario){
		$db = self::getDb();
		$sql = "SELECT * FROM Mensajes where CodReceptor = " . $codUsuario . " AND Estado = 'NUEVO' ORDER BY fecha DESC"; 
		$result = $db->query($sql);	

		if($result){
			return $result->num_rows;
		}
		return 0;
	}
	public static function getMsgEnviado($codUsuario){
		$db = self::getDb();
		$sql = "SELECT * FROM Mensajes where CodEmisor = " . $codUsuario. " ORDER BY fecha DESC"; 
		$mensajes = $db->query($sql);	

		if($mensajes){
			while($row = $mensajes->fetch_array()){
				$msg[] = new Mensaje($row);
			}		
			return $msg;
		}
		return false;
	}
	public static function getMsgFromTo($codEmisor, $codReceptor){
		$db = self::getDb();
		$sql = "SELECT * FROM Mensajes where CodEmisor = " . $codEmisor. " AND CodReceptor = " .$codReceptor ." ORDER BY fecha DESC" ; 
		$mensajes = $db->query($sql);	

		if($mensajes){
			while($row = $mensajes->fetch_array()){
				$msg[] = new Mensaje($row);
			}		
			return $msg;
		}
		return false;
	}
	public static function getMsg($codUsuario){
		$db = self::getDb();
		$sql = "SELECT * FROM Mensajes where CodReceptor = " . $codUsuario ." ORDER BY Estado, fecha DESC" ; 
		$mensajes = $db->query($sql);	

		if($mensajes){
			$msg = [];
			while($row = $mensajes->fetch_array()){
				$msg[] = new Mensaje($row);
			}		
			return $msg;
		}
		return false;
	}
	public static function insertMsg($emis, $dest, $asunto, $msg){
		$db = self::getDb();
		$sql = "INSERT INTO Mensajes (CodEmisor,CodReceptor,Asunto, Mensaje)";
		$sql .= "values(".$emis.",".$dest.",'".$asunto."','".$msg."')" ; 
		$insert = $db->query($sql);
		if($insert){
			return true;
		}
		return $db->error;
	}
	public static function changeState($codMensaje){
		$db = self::getDb();
		$sql = "UPDATE Mensajes SET Estado = 'VISTO' WHERE CodMensaje = $codMensaje";
		$alter = $db->query($sql);

		if($alter){
			return $alter;
		}
		return $db->error;
	}


}
?>