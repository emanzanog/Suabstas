<?php
require_once("../utils/checks.php");
require_once("../Model/dbmanager.php");
session_start();
if((!isset($_POST['usr']) || !isset($_POST['pass'])) && (!isset($_GET['usr']) || !isset($_GET['pass']))){
	header("Location: ./login.php?e=2");
}else{
	$usr= isset($_POST['usr'])?$_POST['usr']:$_GET['usr'];
	$pass= isset($_POST['pass'])?$_POST['pass']:$_GET['pass'];
	if(!sanitizeInput($usr) || !sanitizeInput($pass)){
		header("Location: ./login.php?e=1");
	}else{

		$res = DbManager::authnUser($usr,$pass);
		if($res->getCodUsuario()!=null){
			$_SESSION['sesion']['codUsuario']= $res->getCodUsuario();
			$_SESSION['sesion']['nickName']= $res->getNickName();
			$_SESSION['sesion']['email']= $res->getEmail();
			$_SESSION['sesion']['pass']= $res->getPassword();
			$_SESSION['sesion']['nombre']= $res->getNombre();
			$_SESSION['sesion']['apellidos']= $res->getApellidos();
			header("Location: ../index.php");
		}else{
			header("Location: ./login.php?e=1");
		}
	}


}

?>