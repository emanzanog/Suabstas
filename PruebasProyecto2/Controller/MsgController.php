<?php

require_once("../Model/dbmanager.php");
require_once("../view/msg/msgView.php");
session_start();
class MsgController{

	public function __construct($metodo){
		/*if($metodo=='generaMsg'){
			$this->generaCabecera();
		}*/
		$this->$metodo();
	}
	/*public function generaCabecera(){
		if(isset($_POST['sesion']) || isset($_SESSION['sesion'])){
			$sesion = isset($_SESSION['sesion'])? $_SESSION['sesion'] : $_POST['sesion'];
			$numMsg = DbManager::numMsg($sesion['codUsuario']);
			echo MsgView::generaCabecera($numMsg);
		}
	}*/

	public function generaMsg(){
		if(isset($_POST['sesion']) || isset($_SESSION['sesion'])){
			$sesion = isset($_SESSION['sesion'])? $_SESSION['sesion'] : $_POST['sesion'];
			$mensajes = DbManager::getMsgByReceptor($sesion['codUsuario']);
			$total = "";
			$numMsg = DbManager::numMsg($sesion['codUsuario']);
			$total .= MsgView::generaCabecera($numMsg);
			foreach($mensajes as $msg){
				$emisor = DbManager::getUser($msg->getCodEmisor());
				$receptor = DbManager::getUser($msg->getCodReceptor());
				$ahora = MsgView::creaMensaje($msg,$emisor,$receptor);
				$total .=$ahora;
			}
			if (count($mensajes)<=0){
				$ahora = MsgView::noMsgPanel();
				$total .= $ahora;
			}

			$total .= "<script type='text/javascript' src='./utils/botonesPanelMsg.js'></script>";
			echo $total;	
		}	

	}
	public function nuevoMsg(){
		if(isset($_POST['sesion']) || isset($_SESSION['sesion'])){
			$sesion = isset($_SESSION['sesion'])? $_SESSION['sesion'] : $_POST['sesion'];
			echo MsgView::nuevoMensaje($_SESSION['sesion']['codUsuario']);	
		}	

	}
	public function insertMsg(){
		$sesion = isset($_SESSION['sesion'])? $_SESSION['sesion'] : $_POST['sesion'];
		$emisor = $_SESSION['sesion']["codUsuario"];
		$receptor = $_POST['receptor'];//es el nickname, no el codigo
		$codReceptor = DbManager::getCodUsr($receptor)->getCodUsuario();
		$asunto = $_POST['asunto'];
		$mensaje = $_POST['mensaje'];
		$return = DbManager::insertMsg($emisor, $codReceptor, $asunto, $mensaje);
		
	
		echo $return;
		
	}

	public function leido(){
		$codMsg = $_POST['codMsg'];
		$res = DbManager::changeState($codMsg);
		echo $res;

	}

	public function borrarMsg(){
		$codM = $_POST['codMsg'];
		$resultado = DbManager::deleteMsg($codM);
		echo $resultado;

	}
	public function buscaSugestiones(){
		//valor del input
		$busqueda = $_POST['valor'];
		$codUsuario = $_SESSION['sesion']['codUsuario'];
		$personas = DbManager::buscaPersonas($codUsuario);
		//array auxiliar
		$validos = [];
		foreach ($personas as $pers) {
			if(strpos($pers->getNickName(), $busqueda) !== FALSE){
				$validos[] = $pers;
			}
		}
		$respuesta = "";
		foreach($validos as $valido){
			$respuesta .= MsgView::suggestion($valido->getNickName());
		}
		echo $respuesta;
		//echo var_dump($cosas);
	}
	
}
if(isset($_POST['metodo'])){
	$msgController;
	switch($_POST['metodo']){
		case "creaPantalla":
			$msgController = new MsgController("generaMsg");
			break;
		case "nuevoMensaje":
			$msgController = new MsgController("nuevoMsg");
			break;	
		case "insertMensaje":
			$msgController = new MsgController("insertMsg");
			break;
		case "leido":
			$msgController = new MsgController("leido");
			break;
		case "borrarMsg":
			$msgController = new MsgController("borrarMsg");
			break;	
		case "buscaSugestiones":
			$msgController = new MsgController("buscaSugestiones");
			break;	
		default:
		header("Location: ../index.php");
			break;
	}
}else{
	header("Location: ../index.php");
}


?>