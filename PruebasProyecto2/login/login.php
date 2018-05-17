<?php  
session_start();
if(isset($_SESSION['usr'])){
	header("Location: ../index.php");
}
$msg = null;
if(isset($_GET['e'])){
	switch($_GET['e']){
		case "1":
			$msg =  "<span style='color:red'> Error, datos introducidos incorrectos. </span>";
			break;
		case "2":
			$msg =  "<span style='color:red'> Error, faltan datos. </span>";
			break;
		default:
			$msg = "<span style='color:red'> Error desconocido. </span>";
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="../favicon.png">
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/fontawesome-all.css">
	<script type="text/javascript" src="../resources/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../utils/sanitizeInputs.js"></script>
	<title>SUBASTAS BASTAS</title>
</head>
<body>
	<div class="container col-xs-12 col-sm-8 col-md-6 col-lg-4">
		<div class="card">
			<div class="card-header">Inicia sesión
				<?php
				if($msg!=null){
					echo $msg;
				}
				?>
			</div>
			<form action="./comprobarLogin.php" id="form" method="post" class="card-body">
				<div class="form-group">
					<label for="usr">Nombre de Usuario</label>
					<input type="text" class="form-control form-control-lg check" name="usr" id="usr" placeholder="Usuario">
				</div>
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control form-control-lg check" name="pass" id="pass" placeholder="Contraseña...">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-outline-primary btn-lg">Acceder</button>
				</div>
			</form>
			<a href="../index.php" class="btn btn-outline-warning">Acceder sin usuario</a>
			<h6 class="text-center">¿Aún no estás registrado? <a href="./signin.php" >Regístrate</a> y accede a un mundo de posibilidades.</h6>
		</div>
	</div>
	



	<script type="text/javascript">
		$("#form").submit(function(evt){
			
			var bien = true;
			$(".check").each(function(){
				if(!sanitize($(this).val())){
					bien=false;
				}
			});
			if(!bien){
				evt.preventDefault();
				//return false;
			}
		});
	</script>
	<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>
