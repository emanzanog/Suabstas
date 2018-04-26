<?php

	include("../DATA/connector.php");
	session_start();
	$login = "Location: ./login.php";
	$index = "Location: ../index.php";
	
	if(!isset($_POST['usr']) || !isset($_POST['pass'])){
		header($login);
	}else{
		if(strlen($_POST['usr'])==0 || strlen($_POST['pass'])==0){
			header($login);
		}else{
			$usr = $_POST['usr'];
			$pass = $_POST['pass'];
			$db = Connector::getInstance();
		    $mysqli = $db->getConnection(); 
		    $sql_query = "SELECT CodUsuario, NickName, Password FROM Usuario WHERE NickName = '".$usr."' AND Password = '".$pass."'";
		    $result = $mysqli->query($sql_query);
		    if(!$result || mysqli_num_rows($result)==0){
		    	header($login);
		    }else{
		    	$_SESSION['sesion']=array();
		    	$row = $result->fetch_array();
		    	if($row){
			    	$_SESSION['sesion']['usr'] = $usr;
			    	$_SESSION['sesion']['pass'] = $pass;
			    	$_SESSION['sesion']['CodUsr'] = $row[0];	
		    	}
		    	header($index);
		    }

		}
	}

?>