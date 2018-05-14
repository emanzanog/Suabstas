<?php
require_once("../utils/checks.php");
require_once("../Model/dbmanager.php");
if(isset($_POST['nombre'],$_POST['apell'],$_POST["mail"],$_POST['usr'],$_POST['pass'])){
	$nombre = $_POST['nombre'];
	$apell = $_POST['apell'];
	$mail = $_POST["mail"];
	$usr = $_POST['usr'];
	$pass = $_POST['pass'];

	if(!sanitizeInput($nombre) || !sanitizeInput($apell) || !sanitizeMail($mail) || !sanitizeInput($usr) || !sanitizeInput($pass)){
		header("Location: ./signin.php?e=2");
	}else{
		$res = DbManager::insertUser($nombre, $apell, $usr, $mail, $pass);
		if($res){
			header("Location: ./comprobarLogin.php?usr=".$usr."&pass=".$pass);
		}else{
			header("Location: ./signin.php?e=1");
		}
	}

}else{
	header("Location: ./signin.php?e=1");
}

?>