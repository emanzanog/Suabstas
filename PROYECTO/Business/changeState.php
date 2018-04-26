<?php
include_once("../DATA/operacionesDB.php");

if(isset($_POST['CodMensaje']))
{
	$res = OpDb::changeState($_POST['CodMensaje']);
	if($res){
		echo $res;
	}else{
		echo $res;
	}
}else{
	echo false;
}


?>