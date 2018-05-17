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
		html{
			margin:0;
			padding:0;
		}
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
		
		$(function(){
			//var sesion = <?=isset($_SESSION['sesion'])?json_encode($_SESSION['sesion']):1;?> ;
			$("cuerpo").load("./view/prueba.php");
			$("#mail").click(function(evt){
				$("cuerpo").load("./Controller/MsgController.php",{"metodo":"creaPantalla"});
			});
			$("#profile").click(function(evt){
				$("cuerpo").load("./Controller/ProfileController.php",{"metodo":"creaPantalla"});
			});
			$("#upload").click(function(evt){
				$("cuerpo").load("./Controller/AuctionController.php",{"metodo":"principal"});
			});
		})
	</script>
	<script type="text/javascript" src="./resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>