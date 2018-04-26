<?php

	session_start();
	if(isset($_SESSION['sesion'])){
		header("Location: ../index.php");
	}else{

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Login: Subastas Bastas</title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
</head>
<body>
	<div class="container col-xs-12 col-sm-8 col-md-6 col-lg-4">
		<div class="card">
			<div class="card-header">Inicia sesión</div>
			<form action="./comprobarLogin.php" method="post" class="card-body">
				<div class="form-group">
					<label for="usr">Nombre de Usuario</label>
					<input type="text" class="form-control form-control-lg" name="usr" id="usr" placeholder="Usuario">
				</div>
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control form-control-lg" name="pass" id="pass" placeholder="Contraseña...">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary btn-lg">Acceder</button>
				</div>
			</form>
			<h6 class="text-center	">¿Aún no estás registrado? <a href="./paginaRegistro.php" >Regístrate</a> y accede a un mundo de posibilidades.</h6>
		</div>
	</div>


	<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
</body>
</html>
	
<?php
	}

?>