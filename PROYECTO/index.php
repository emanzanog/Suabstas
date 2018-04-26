<?php
	session_start();
	if(!isset($_SESSION['sesion'])){
		header("Location: ./AC/login.php");
	}
	if(!isset($_SESSION['sesion']['usr']) || !isset($_SESSION['sesion']['pass'])){
		header("Location: ./AC/login.php");
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="icon" href="favicon.png">
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
		</style>
	</head>
	<body>
	<?php
		include_once("./view/cabecera.php");
	?>

	<div class="contenido"></div>
	<?php
		include_once("./view/footer.php");
	?>
	<script type="text/javascript">
		$(function(){
			$(".contenido").load("./view/principal.php");
		});

		$("#mail").click(function(evt){
			evt.preventDefault();
			$(".contenido").load("./view/msgpage.php");
			/** TODO : 
				ALGO NO FUNCIONA AQUÍ
			*/
			
			$(".leido").click(function(evt){
				evt.preventDefault();
				var $msg =$(this).attr("name");
				console.log($msg);
				$(this).parents('.nuevo').removeClass("nuevo");
				return false;
			});
			return false;
		});
		$("#profile").click(function(evt){
			evt.preventDefault();
			$(".contenido").load("./view/perfilUsuario.php");
			return false;
		});

		
	</script>
	<script type="text/javascript" src="./resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	
	</body>
	</html>

	


	

