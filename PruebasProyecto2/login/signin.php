<?php 
$error = false;
if(isset($_GET['e'])){
	$error =true;
	$msg = "<span style='color:red'>";
	switch($_GET['e']){
		case "1":
			$msg .= " Error, No se pudo crear el usuario";
			break;
		case "2":
			$msg .= " Error, Algún campo no es válido";
			break;
		default:
			$msg .= " Error Desconocido";
	}
	$msg .= "</span>";
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

	<div class="container col-sm-12 col-md-6">
		<div class="card">
			<div class="card-header">Registro<?php if($error){
				echo $msg;
			}?></div>
			<form action="./registro.php" method="post" id="form" class="card-body">
				<div class="form-row">
					<div class="form-group col-lg-6 col-sm-12 col-xs-12">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="Nombre" required>
					</div>
					<div class="form-group col-lg-6  col-xs-12">
						<label for="apll">Apellidos</label>
						<input type="text" class="form-control form-control-lg" name="apell" id="apll" placeholder="Apellidos" required>
					</div>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">@</div>
						</div>
						<input type="email" class="form-control form-control-lg" name="mail" id="email" placeholder="algo@ejemplo.com" required>

					</div>
				</div>
				<div class="form-group">
					<label for="usr">Nombre de Usuario</label>
					<input type="text" class="form-control form-control-lg" name="usr" id="usr" placeholder="Usuario" required>
				</div>
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control form-control-lg" name="pass" id="pass" placeholder="Contraseña..." required>
				</div>
				<div class="form-group">
					<label for="pass2">Repite la contraseña</label>
					<input type="password" class="form-control form-control-lg" id="pass2" placeholder="Contraseña..." required>
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="gridCheck" required>
						<label class="form-check-label" for="gridCheck">
							Soy mayor de 18 años.
						</label>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-lg">Adjudicado!</button>
				</div>
			</form>
			<h6 class="text-center	">¿Ya estás registrado? <a href="./login.php">Inicia sesión</a></h6>
		</div>
	</div>



	<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#form").submit(function(evt){
				$("input:not([type='submit'])").each(function(){
					$(this).css({
							"border-color": ""
						});
					if($(this).attr("type") == "email"){
						var bool = sanitizeMail($(this).val());
					}else{
						var bool = sanitize($(this).val());
					}
					if(!bool){
						console.log($(this));
						evt.preventDefault();
						$(this).css({
							"border-color": "red"
						});
					}
				});
				if($("#pass").val()!=$("#pass2").val()){
					evt.preventDefault();
					console.log($("#pass").val());
					console.log($("#pass2").val());
					$("[type='password']").css({
						"border-color": "red"
					});
				}
			});
		});
	</script>
</body>
</html>