<?php
session_start();
$sesion_abierta;
if(!isset($_SESSION['sesion']['codUsuario'])){
	$sesion_abierta = false;
}else{
	$sesion_abierta = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="./favicon.png">
	<link rel="stylesheet" type="text/css" href="./resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./resources/css/fontawesome-all.css">
	<script type="text/javascript" src="./resources/js/jquery-3.3.1.min.js"></script>
	<title>SUBASTAS BASTAS</title>
	<style type="text/css">
		.nuevo{
			border: 1px dashed red;
		}
		.marginTop{
			margin-top:50px;
		}
		.noMsg{
			min-height: 500px;
		}
		.sugg{
			/*border:1px solid black;
			border-radius: 5px;
			padding: 5px;*/
			margin: 5px;
		}
	</style>
</head>
<body>
	<header>
		<?php
		include_once("./view/header.php");
		?>
	</header>
	<cuerpo></cuerpo>
	<footer>
		<?php
		include_once("./view/footer.php");
		?>
	</footer>
	<script type="text/javascript">
		var sesion = <?=isset($_SESSION['sesion'])?json_encode($_SESSION['sesion']):1;?> ;
		$(function(){
			
			$("cuerpo").load("./view/prueba.php");
			$("#mail").click(function(evt){
				$("cuerpo").load("./Controller/MsgController.php",{"sesion":sesion,"metodo":"creaPantalla"});
			});
			$("#profile").click(function(evt){
				$("cuerpo").load("./Controller/ProfileController.php",{"sesion":sesion,"metodo":"creaPantalla"});
			});
			$("#upload").click(function(evt){
				$("cuerpo").load("./Controller/AuctionController.php",{"sesion":sesion,"metodo":"principal"});
			});
		})
	</script>
	<script type="text/javascript" src="./resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>