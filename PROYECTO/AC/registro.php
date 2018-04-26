<?php

require_once("../DATA/Persona.php");
require_once("../DATA/operacionesDB.php");
session_start();
$index = "Location: ../index.php";
if(isset($_POST['nombre']) 
	&& isset($_POST['apell']) 
	&& isset($_POST['usr']) 
	&& isset($_POST['mail']) 
	&& isset($_POST['pass']))
{
	if(strlen($_POST['nombre'])!=0 || strlen($_POST['apell'])!=0 || strlen($_POST['usr'])!=0 || strlen($_POST['mail'])!=0 || strlen($_POST['pass'])!=0)
	{
		$usuario = new Persona($_POST["nombre"],$_POST["apell"],$_POST["usr"],$_POST["pass"],$_POST["mail"]);

		if(OpDb::insertUsuario($usuario)){
			$usr = $_POST["usr"];
			$pass = $_POST["pass"];
			$row = OpDb::selectUsuario($usr,$pass);
	    	$_SESSION['sesion']=array();	
	    	if($row){
		    	$_SESSION['sesion']['usr'] = $usr;
		    	$_SESSION['sesion']['pass'] = $pass;
		    	$_SESSION['sesion']['CodUsr'] = $row['CodUsuario'];	
	    	}
	    	header($index);
		    }
		else{
			header("Location: ./paginaRegistro.php");
		}

	}else{
			header("Location: ./paginaRegistro.php");
		}

}else{
			header("Location: ./paginaRegistro.php");
		}

?>