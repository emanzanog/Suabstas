<?php
session_start();
$emisor = $_SESSION['sesion']['CodUsr'];
include_once("../DATA/operacionesDB.php");
$jsondata = array();
if(isset($_POST['destinatario']) && isset($_POST['asunto']) && isset($_POST['mensaje'])){
	$nick = $_POST['destinatario'];
	$destinatario = OpDb::selectCodUsr($nick);
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	$algo = OpDb::insertMsg($emisor,$destinatario,$asunto,$mensaje);

	$jsondata['success'] = $algo;
	
		
	
		
	
}else{
	$jsondata['success'] = false;
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_FORCE_OBJECT);

?>