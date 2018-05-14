<?php

require_once("../Model/dbmanager.php");
require_once("../view/profile/ProfileView.php");
session_start();

class ProfileController{
	public function __construct($metodo){

		$this->$metodo();
	}
	
	public function creaPantalla(){
		if(isset($_POST['sesion']) || isset($_SESSION['sesion'])){
			$sesion = isset($_SESSION['sesion'])? $_SESSION['sesion'] : $_POST['sesion'];
			$Usuario = DbManager::getUser($sesion['codUsuario']);
			$ahora = ProfileView::generaPanel($Usuario);
			$total =$ahora;
			echo $total;	
		}	
	}
	public function updateUsr(){
		echo $_SESSION['sesion'];
		if(isset($_POST['sesion']) || isset($_SESSION['sesion'])){
			$sesion = isset($_SESSION['sesion']) ? $_SESSION['sesion'] : $_POST['sesion'];
			$codUsr = $_POST['codUsr']; 
			$nick = $_POST['nick']; 
			$pass = $_POST['pass']; 
			$mail = $_POST['correo'];

			$update = DbManager::updateUsr($codUsr,$nick,$mail,$pass);
			if($update){
				$respuesta['entra'] = "true";
				$_SESSION["sesion"]["nickName"] = $nick;
			}else{
				$respuesta['entra'] = "false";
			}
		}
		return json_encode($respuesta,JSON_FORCE_OBJECT);
	}

	
	
	
}


if(isset($_POST['metodo'])){
	$profileController;
	switch($_POST['metodo']){
		case "creaPantalla":
			$profileController = new ProfileController("creaPantalla");
			break;
		case "updateUsr":
			$profileController = new ProfileController("updateUsr");
			break;	
		default:
			break;
	}
}else{
	header("Location: ../index.php");
}




?>